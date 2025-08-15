<?php

namespace App\Services;

use App\Models\InventoryLedger;
use App\Models\StockBalance;
use App\Models\Lot;
use Illuminate\Support\Facades\DB;

class InventoryService
{
    public function move(string $refType, int $refId, int $itemId, int $fromLocationId, int $toLocationId, float $qty, ?int $lotId = null, int $userId = null): void
    {
        DB::transaction(function () use ($refType, $refId, $itemId, $fromLocationId, $toLocationId, $qty, $lotId, $userId) {
            $this->adjust($refType, $refId, $itemId, $fromLocationId, $qty, 'OUT', $lotId, $userId);
            $this->adjust($refType, $refId, $itemId, $toLocationId, $qty, 'IN', $lotId, $userId);
        });
    }

    protected function adjust(string $refType, int $refId, int $itemId, int $locationId, float $qty, string $direction, ?int $lotId, ?int $userId): void
    {
        $balance = StockBalance::where([
            'item_id' => $itemId,
            'location_id' => $locationId,
            'lot_id' => $lotId,
        ])->lockForUpdate()->first();

        if (!$balance) {
            $balance = StockBalance::create([
                'item_id' => $itemId,
                'location_id' => $locationId,
                'lot_id' => $lotId,
                'qty' => 0,
            ]);
        }

        if ($direction === 'OUT' && $balance->qty < $qty) {
            throw new \RuntimeException('Insufficient stock balance');
        }

        if ($direction === 'OUT') {
            $balance->qty -= $qty;
        } else {
            $balance->qty += $qty;
        }
        $balance->save();

        if ($lotId && $direction === 'OUT') {
            $lot = Lot::lockForUpdate()->findOrFail($lotId);
            if ($lot->qty_remaining < $qty) {
                throw new \RuntimeException('Insufficient lot balance');
            }
            $lot->qty_remaining -= $qty;
            $lot->save();
        }

        InventoryLedger::create([
            'txn_date' => now(),
            'ref_type' => $refType,
            'ref_id' => $refId,
            'item_id' => $itemId,
            'location_id' => $locationId,
            'lot_id' => $lotId,
            'direction' => $direction,
            'qty' => $qty,
            'balance_after' => $balance->qty,
            'created_by' => $userId,
        ]);
    }
}

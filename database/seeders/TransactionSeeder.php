<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $products = Product::all();
        $customer = User::find(2); // Menggunakan user dengan id 2 sebagai customer

        $statuses = ['pending', 'completed', 'cancelled'];

        for ($i = 1; $i <= 20; $i++) {
            // Buat transaksi
            $transaction = Transaction::create([
                'invoice_number' => 'INV-' . strtoupper(Str::random(6)),
                'customer_id' => $customer->id,
                'total_price' => 0, // Akan dihitung setelah items dibuat
                'status' => $faker->randomElement($statuses),
                'payment_proof' => $faker->boolean(70) ? 'proof_' . $i . '.jpg' : null, // 70% ada payment proof
            ]);

            // Tentukan jumlah items per transaksi (1-5 items)
            $itemCount = $faker->numberBetween(1, 5);
            $totalPrice = 0;

            // Ambil produk random untuk setiap item
            $selectedProducts = $products->random($itemCount);

            foreach ($selectedProducts as $product) {
                $quantity = $faker->numberBetween(1, 3); // Quantity realistis 1-3
                $price = $product->price;
                $itemTotal = $price * $quantity;

                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $itemTotal,
                ]);

                $totalPrice += $itemTotal;
            }

            // Update total price transaksi
            $transaction->update(['total_price' => $totalPrice]);
        }
    }
}

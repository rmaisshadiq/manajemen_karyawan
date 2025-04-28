<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $durasi_kontrak = $this->faker->numberBetween(0, 24);
        if ($durasi_kontrak === 0) {
            $status = 'selesai';
        }
        else {
            $status = $this->faker->randomElement(['tidak_aktif', 'aktif']);
        }

        return [
            //
            'nama_karyawan' => fake() -> name(),
            'bidang_keahlian' => fake() -> randomElement(['Coding', 'Designing', 'Writing', 'Accounting']),
            'email' => fake() -> unique() -> safeEmail,
            'nomor_telepon' => fake() -> phoneNumber(),
            'tanggal_mulai' => fake() -> date('Y-m-d'),
            'durasi_kontrak' => $durasi_kontrak,
            'status' => $status
        ];
    }
}

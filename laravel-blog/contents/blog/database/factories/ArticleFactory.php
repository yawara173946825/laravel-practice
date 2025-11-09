<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // ← user_id に使う場合はこれをインポート！

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // ✅ 他モデルとリレーションを自動生成
            'title' => $this->faker->sentence(), // ✅ ランダムなタイトル
            'body' => $this->faker->paragraph(), // ✅ ランダムな本文
            'created_by' => 1, // ✅ 仮の作成者ID（本来はauthユーザーなど）
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // atau sesuaikan dengan user yang diinginkan
        
        $posts = [
            [
                'title' => '7 Strategi Efektif untuk Meningkatkan Engagement di Media Sosial',
                'content' => "Engagement di media sosial adalah kunci kesuksesan brand Anda di era digital. Berikut adalah 7 strategi yang terbukti efektif:

1. Konsistensi Posting
Posting konten secara teratur dengan jadwal yang konsisten. Ini membantu algoritma media sosial dan membuat audiens terbiasa dengan konten Anda.

2. Konten Visual Berkualitas
Gunakan gambar dan video berkualitas tinggi. Visual yang menarik mendapat 40% lebih banyak engagement dibanding teks biasa.

3. Storytelling yang Menarik
Ceritakan kisah di balik brand Anda. Manusia naturally tertarik dengan cerita yang memiliki nilai emosional.

4. Interaksi Aktif
Respond cepat terhadap komentar dan pesan. Engagement adalah komunikasi dua arah.

5. User-Generated Content
Dorong followers untuk membuat konten tentang brand Anda. Ini membangun komunitas yang loyal.

6. Waktu Posting yang Tepat
Analisis kapan audiens Anda paling aktif dan sesuaikan jadwal posting.

7. Call-to-Action yang Jelas
Setiap post harus memiliki tujuan. Ajak audiens untuk melakukan tindakan spesifik.",
                'user_id' => $user->id
            ],
            [
                'title' => 'Cara Membangun Personal Branding yang Kuat di LinkedIn',
                'content' => "LinkedIn adalah platform profesional yang sempurna untuk membangun personal branding. Berikut langkah-langkahnya:

1. Optimasi Profil
- Gunakan foto profesional
- Tulis headline yang menarik
- Lengkapi summary yang menggambarkan value proposition Anda
- Tambahkan skills dan endorsement

2. Konsistensi Konten
Posting konten yang relevan dengan industri Anda minimal 2-3 kali seminggu. Format bisa berupa:
- Artikel panjang
- Tips singkat
- Case study
- Behind the scenes

3. Engagement yang Berkualitas
- Komentari post orang lain dengan insight berharga
- Bagikan pengalaman dan pembelajaran
- Bangun jaringan dengan profesional sejenis

4. Showcase Expertise
- Bagikan pencapaian profesional
- Publikasikan proyek sukses
- Tunjukkan proses behind the scenes

5. Authentic Voice
Temukan dan pertahankan suara unik Anda dalam setiap konten yang dibagikan.",
                'user_id' => $user->id
            ],
            [
                'title' => 'Tips Membuat Content Calendar untuk Social Media',
                'content' => "Content calendar adalah fondasi strategi social media yang sukses. Berikut cara membuatnya:

1. Audit Konten Existing
- Analisis performa konten sebelumnya
- Identifikasi tipe konten yang paling engage
- Catat waktu posting terbaik

2. Tentukan Pilar Konten
Bagi konten dalam beberapa kategori:
- Edukasi (30%)
- Engagement (25%)
- Promosi (20%)
- Entertainment (15%)
- Behind the scenes (10%)

3. Buat Template Calendar
Include informasi penting:
- Tanggal posting
- Platform
- Format konten
- Caption
- Hashtag
- Visual assets needed

4. Plan Ahead
- Siapkan konten 1 bulan ke depan
- Sisakan ruang untuk konten real-time
- Review dan adjust berkala

5. Tools yang Membantu
- Google Calendar
- Trello
- Hootsuite
- Later
- Buffer

6. Evaluasi dan Improve
Track metrics penting:
- Engagement rate
- Reach
- Click-through rate
- Conversion",
                'user_id' => $user->id
            ],
            [
                'title' => 'Mengoptimalkan Instagram untuk Bisnis: Panduan Lengkap',
                'content' => "Instagram adalah platform powerful untuk bisnis. Berikut cara mengoptimalkannya:

1. Setup Profil Bisnis
- Konversi ke akun bisnis
- Lengkapi bio yang menarik
- Tambahkan contact info
- Gunakan highlight stories

2. Konten Strategy
- Feed yang cohesive
- Stories untuk engagement
- Reels untuk reach
- IGTV untuk konten panjang
- Guides untuk katalog

3. Visual Branding
- Konsisten dengan color palette
- Template yang recognizable
- High-quality photos
- On-brand graphics

4. Engagement Tactics
- Gunakan fitur interaktif
- Poll di stories
- Q&A sessions
- Live streaming
- Kolaborasi dengan influencer

5. Analytics & Optimization
- Monitor Instagram Insights
- Track relevant metrics
- A/B testing konten
- Adjust strategy based on data

6. Instagram Shopping
- Set up product catalog
- Tag produk di post
- Buat collections
- Optimize product descriptions",
                'user_id' => $user->id
            ],
            [
                'title' => 'Trend Social Media Marketing 2024 yang Harus Diperhatikan',
                'content' => "Trend social media terus berevolusi. Berikut trend yang akan dominan di 2024:

1. Short-form Video
- TikTok masih mendominasi
- Instagram Reels semakin popular
- YouTube Shorts gaining traction
- Vertical video format

2. Social Commerce
- Live shopping events
- In-app purchasing
- AR try-on features
- Social storefronts

3. AI Integration
- Chatbots for customer service
- Personalized content delivery
- Automated posting
- Smart analytics

4. Privacy-Focused Marketing
- First-party data
- Transparent data practices
- Enhanced security measures
- User consent prioritization

5. Community Building
- Private groups
- Exclusive content
- Member-only events
- Community-led initiatives

6. Sustainability Content
- Eco-friendly practices
- Social responsibility
- Transparent supply chain
- Green initiatives",
                'user_id' => $user->id
            ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}

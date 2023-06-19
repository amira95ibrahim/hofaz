<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'site_title_ar' => 'حفاظ',
            'site_title_en' => 'Hofath',
            'keywords_ar' => 'جمعية،حفاظ،خيرية،قرآنية،تبرع،صدقة،زكاة،لجان،لجنة،تبرعات،صدقات،الصدقة،الزكاة',
            'keywords_en' => 'Association, preservation, charitable, Quranic, donation, charity, zakat, committees, committee, donations, alms, charity, zakat',
            'facebook' => '7offath',
            'whatsapp' => '96565524409',
            'instagram' => '7offath',
            'adminFooter' => 'الجمعية الخيرية الكويتية لخدمة القران الكريم وعلومه',
            'frontWebsiteFooter_ar' => 'جميع الحقوق محفوظة للجمعية الخيرية الكويتية 2020 ©',
            'frontWebsiteFooter_en' => 'All rights reserved to the Kuwait Charity Association 2020 ©',
            'youtubeAddress' => '7offath',
            'twitterAddress' => '7offath',
            'phoneNumber' => '96565524409',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('achievements')->insert([
            ['name_ar' => 'مركز قرآني', 'name_en' => 'Quranic center', 'number' => '32', 'image' => 'images/icons/4.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'طالب وطالبة', 'name_en' => 'Male and female student', 'number' => '1468', 'image' => 'images/icons/3.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'جنسية حول العالم', 'name_en' => 'citizenship around the world', 'number' => '486', 'image' => 'images/icons/2.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'معلم ومعلمة', 'name_en' => 'Teacher and teacher', 'number' => '864', 'image' => 'images/icons/1.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'مستفيد من المقارئ القرآنية', 'name_en' => 'A beneficiary of Quranic reciters', 'number' => '32', 'image' => 'images/icons/8.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'ساعة قرآنية تم تدريسها', 'name_en' => 'Quranic hour taught', 'number' => '32', 'image' => 'images/icons/7.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'ختموا القرآن الكريم كاملاً', 'name_en' => 'Seal the entire Holy Quran', 'number' => '32', 'image' => 'images/icons/6.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_ar' => 'حفظوا سورة البقرة', 'name_en' => 'Memorize Surah Al-Baqarah', 'number' => '32', 'image' => 'images/icons/5.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('site_pages_details')->insert([
            ['model' => 'sadaqah', 'title_en' => 'The virtue of charity', 'title_ar' => 'فضل الصدقة', 'details_en' => 'On the authority of Abu Hurairah, may God be pleased with him, he said: The Messenger of God, may God’s prayers and peace be upon him, said: “Whoever gives charity equal to a date from good earnings - and God does not accept anything but the good - and God accepts it with His right hand, and then nurtures it for its owner as one of you nurtures his colt until it becomes like a mountain.” Narrated by Al-Bukhari (1344) and Muslim (1014).', 'details_ar' => 'عن أبي هريرة رضي الله عنه قال : قال رسول الله صلى الله عليه وسلم : " من تصدق بعدل تمرة من كسب طيب - ولا يقبل الله إلا الطيب - وإن الله يتقبلها بيمينه ، ثم يربيها لصاحبه كما يربي أحدكم فَلوَّه حتى تكون مثل الجبل " . رواه البخاري ( 1344 ) ومسلم ( 1014 )  .', 'image' => 'storage/sadaqah/16825166481604413032.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'zakah', 'title_en' => 'The virtue of zakat', 'title_ar' => 'فضل الزكاة', 'details_en' => 'The Almighty said: [The alms are only for the poor and the needy, and those employed to collect them, and for those whose hearts are to be reconciled, and for the freeing of debtors, and in the way of God and the wayfarer are an obligation from God, and God is All-Knowing, Wise.” (At-Tawbah:60)', 'details_ar' => 'قال تعالى:[ إِنَّمَا الصَّدَقَاتُ لِلْفُقَرَاءِ وَالْمَسَاكِينِ وَالْعَامِلِينَ عَلَيْهَا وَالْمُؤَلَّفَةِ قُلُوبُهُمْ وَفِي الرِّقَابِ وَالْغَارِمِينَ وَفِي سَبِيلِ اللَّهِ وَاِبْنِ السَّبِيلِ فَرِيضَةً مِنْ اللَّهِ وَاللَّهُ عَلِيمٌ حَكِيمٌ](التوبة:60)', 'image' => 'storage/zakah/16825169702117136319.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'kafalah', 'title_en' => 'Bail.. a person in the balance', 'title_ar' => 'الكفالة.. إنسان في الميزان', 'details_en' => 'Bail is one of the highest forms of goodness. It is an investment in man, the edification of the Lord, and one of its blessings is combining the types of righteousness. From ongoing charity, useful knowledge, and among its fruits is supplication for you in your life and after your death, and perhaps more than a child! On the Day of Resurrection, people will find dirhams and dinars in their scales. and receive God and in your balance a "man"; facilitated his way of knowledge, or ensured his life', 'details_ar' => 'الكفالة من أسمى صور الخير؛ فهي استثمار في الإنسان بنيان الرب، ومن بركتها الجمع بين أنواع البر؛ من صدقة جارية، وعلم نافع، ومن ثمارها الدعوة لك في حياتك وبعد موتك، وربما أكثر من الولد! ويوم القيامة يجد الناس في موازينهم الدرهم والدينار؛ وتلقى الله وفي ميزانك "إنسان"؛ يسرت له سبيل علم، أو كفلت له حياة', 'image' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'relief', 'title_en' => 'Best known as an anxious relief', 'title_ar' => 'أفضل المعروف إغاثة الملهوف', 'details_en' => 'Relief is one of the images of human solidarity, a trait that has been known to the Arabs since ancient times. They sheltered the refugee, and provided relief to the distressed, and Islam came and made relieving distress a reason for relieving distress on the Day of Resurrection, and among the forms of obligatory relief: helping our people in the Arab and Islamic countries; such as Yemen, Syria and Palestine, meeting their needs, and helping disaster areas', 'details_ar' => 'الإغاثة من صور التكافل الإنساني، خصلة اشتُهرت لدى العرب منذ قديم الزمان؛ فقد آووا اللاجئ، وأغاثوا الملهوف، وأتي الإسلام فجعل تفريج الكُرب سببًا لتفريج كُرب يوم القيامة، ومن صور الإغاثة الواجبة: إعانة أهلنا في البلاد العربية والإسلامية؛ كاليمن وسوريا وفلسطين، وسد حاجاتهم، ومساعدة مناطق الكوارث', 'image' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'waqf', 'title_en' => 'Waqf.. a tree whose fruit lasts', 'title_ar' => 'الوقف.. شجرة تدوم ثمرتها', 'details_en' => 'The endowment is an ongoing charity, which guarantees the sustainability of giving to the needy, and the continuity of the reward for the charitable, and the site facilitates the endowment charity through 17 various endowments; From caring for orphans, the sick, and students of knowledge, to building mosques, watering water, and other charitable works.', 'details_ar' => 'الوقف صدقة جارية، تضمن استدامة العطاء للمحتاجين، واستمرارية الأجر للمتصدقين، وييسِّر الموقع صدقة الوقف من خلال 17 وقفية متنوِّعة؛ من رعاية الأيتام والمرضى وطلبة العلم، إلى بناء المساجد وسقي الماء.. وغيرها من أعمال البرِّ، ويحصل الواقف على شهادة مساهمة باسمه أو اسم من يحب أن يهدي إليه ثواب وقفه', 'image' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'project', 'title_en' => 'Browse our charitable projects', 'title_ar' => 'تصفح مشاريعنا الخيرية', 'details_en' => 'Charitable projects covering a broad sector and a variety of charitable works, in more than 44 countries, global mercy plants the seeds of your giving in their lands, and these projects are based on the principle of contribution; Where a number of people of giving participate in the completion of these projects, each according to his capacity, as it is a race track in doing good deeds..so go with us', 'details_ar' => 'مشروعات خيرية تغطي قطاعًا عريضًا وضروبًا متنوعة من أعمال الخير، في أكثر من 44 دولة تغرس الرحمة العالمية بذور عطائكم في أراضيها، وتقوم تلك المشروعات على مبدأ المساهمة؛ حيث يتشارك عدد من أهل العطاء في إنجاز تلك المشروعات كلٌّ بحسب سعته، فهي مضمار سباق في عمل الخيرات.. فانطلق معنا', 'image' => null, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('nav_sections')->insert([
            ['model' => 'iftar', 'name_en' => 'Iftar', 'name_ar' => 'إفطار', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'sadaqa', 'name_en' => 'sadaqah', 'name_ar' => 'صدقه', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'zakah', 'name_en' => 'Zakah', 'name_ar' => 'زكاة', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'kafalat', 'name_en' => 'kafalah', 'name_ar' => 'كفالة', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'relief', 'name_en' => 'relief', 'name_ar' => 'إغاثة', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'waqf', 'name_en' => 'waqf', 'name_ar' => 'وقف', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'projects', 'name_en' => 'projects', 'name_ar' => 'مشاريع', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'gift', 'name_en' => 'gift', 'name_ar' => 'هدية', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'donation', 'name_en' => 'Periodic donation', 'name_ar' => 'التبرع الدوري', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'onlineService', 'name_en' => 'My charity account', 'name_ar' => 'حسابي الخيري', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'aboutUs', 'name_en' => 'about us', 'name_ar' => 'من نحن', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'teams', 'name_en' => 'volunteer teams', 'name_ar' => 'فرق تطوعية', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['model' => 'directors', 'name_en' => 'Board of Directors', 'name_ar' => 'مجلس الإدارة', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}

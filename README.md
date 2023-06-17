Yönetim paneline bağlanmak için kullanabileceğiniz hesap:
- ` e-mail = admin@hotmail.com `
- ` şifre = password ` 
 
          
           
# İLETİŞİM
Bir sorunla karşılaşmanız durumunda iletişim adresim:
  - `umutmestoglu@hotmail.com`


# LARAVEL KURULUMU
Web üzerinde [http://www.wampserver.com/en/#](https://getcomposer.org/) adresinden composer'ı indirip kuruyoruz.
- Projeyi oluşturmak istediğiniz yere, örneğin masaüstüne kuracaksanız __cd desktop__ komutunu yazıp composer üzerinden masaüstüne kuracak şekilde belirliyoruz.
- composer terminaline ``` composer global require laravel/installer ```kodunu yazıp laravel'i kuruyoruz.
- Kurulum tamamlandıktan sonra ilk projemizi oluşturabiliriz. ``` composer create-project laravel/laravel ornek-uygulama ``` yazıp masaüstünüze ornek-uygulama adlı laravel projenizi kurabilirsiniz.
- Kurulum tamamlandıktan sonra kullandığınız IDE'de proje klasörünü açıp terminale ``` __php artisan serve__ ``` yazarsanız projeniz çalışmaya başlayacaktır.


## Veritabanına bağlanmak
Bir veritabanı oluşturmak ve bağlanmak için ilk önce [https://www.apachefriends.org/tr/index.html] sitesinden XAMPP kurulumunu yapıyoruz.
- XAMPP, gerekli tüm yazılım bileşenlerini sağlayarak web hizmetleri için bir PHP geliştirme ortamı kurmaya yarayan en popüler yazılım paketidir.
- Bilgisayarınızı sanki sanal bir sunucuymuş gibi kullanmanıza olanak sağlar.
- XAMPP kurulumunu yaptıktan sonra Apache ve MySQL kısımlarına start veriyoruz ve bilgisayarımız localhostta çalışmaya başlıyor.
- Bir veritabanı oluşturmak istiyorsak MySQL kısmında yer alan Admin'e tıklayarak açılan PhpMyAdmin sitesinden kolaylıkla bir veritabanı oluşturabiliriz.
- Oluşturacağımız veritabanının ismi projede de belirlediğim gibi __secondhand__ olmalıdır. Aksi takdirde sunucuya __bağlanamazsınız__.

    - Veritabanını Laravele bağlamak için bağlanmak istediğimiz veritabanının ismini, oluşturduğumuz Laravel projesinin ana dizininde bulunan .env dosyasında **"DB_DATABASE="** kısmına yazıyoruz.
- Bu projede Veritabanının ismini **secondhand** olarak belirledim. Yani .env dosyasında bağlanma kodumuz **DB_DATABASE=secondhand**.

## MIGRATION OLUŞTURMAK

- Migration kullanılarak veritabanı içerisinde tablolar oluştururuz. Migration dizinimizin dosya yolu: /database/migrations/.

     - Eğer bir migration oluşturmak istiyorsak kullandığımız IDE'nin terminal kısmına __php artisan make:migration create_ornek_migration__ yazarak "ornek" adında bir migration yapısı oluşturabiliriz.
     - Oluşan migration dosyasında __up__ ve __down__ olarak iki tane fonksiyon görürüz.
     - up fonksiyonu tablomuzun genel özelliklerini belirtirken, down fonksiyonu ise tablodan verileri silmemize yarar.
     - Migration oluştururken şifremizin kaç haneden oluşacağını, verimizin sayısal mı metinsel mi olması gerektiğini, default olarak boş veya dolu gelmesi gerektiğini belirtebiliriz.
        - Örnek olarak:
          ```
               Schema::create('users', function (Blueprint $table) {
                 $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                }); 
                ```
                kodunu kullanarak 'users' adında bir tablo oluşturabilir, farklı sütunlar belirleyebilir ve özelliklerini belirtebiliriz.
		    
Benim projemde hali hazırda bulunan migrationlar var, bunların hepsini toplu olarak çalıştırmak istersek terminale __php artisan migrate:fresh --seed__ yazarak bütün migrationları veritabanındaki tablomuza uygulayabiliriz.

# PROJENİN KURULUMU 
### Kurulum
- Projeyi yüklemek ve çalıştırmak için aşağıda belirtilen adımları izleyin.

- Depoyu klonlayın veya indirin
- Proje dizinine gidin ve terminalde __composer install__  ve __php artisan vendor:publish__ komutlarını çalıştırın.
- key tanımlamak için __php artisan key:generate__ komutunu kullanın.
- Projenin ana dizininde .env.example dosyasını kopyalayarak .env adında bir dosya oluşturun.
- .env dosyasında **DB_DATABASE=secondhand** kısmının doğru olduğundan ve uygulama anahtarının oluştuğundan emin olun.
- Bunu yapmak için şu komutu kullanabilirsiniz= ``` cp .env.example .env ```
- Dosyadaki veritabanı adını ve .env kimlik bilgilerini güncelleyin.
- Terminale, __php artisan migrate --seed__ komutunu yazarak migration ile tablo seeder ile de verileri oluşturabilirsiniz.
- Projeyi çalıştırmaya hazırsınız! terminale __php artisan serve__ yazarak çalıştırabilirsiniz.
- Hatalarla karşılaşılması durumunda terminalde __php artisan route:cache__ , __php artisan optimize__ , __php artisan cache:clear__ komutlarını kullanın.

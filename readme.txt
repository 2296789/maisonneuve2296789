**Mac中显示版本**
Laravel v9.52.16 (PHP v8.2.4)

安装composer 
----------------------------------------
https://getcomposer.org/download/ 
点击Composer setup.exe 

打开下载的文件双击后出现安装界面 
选择最新版本（数字最大）
勾选 add this php to your 选择使用的mamp，zamp或wamp
通过browse选择安装地址为 C:/xampp/php/php.exe
其他所有都不都选直接next

在终端（不是软件的终端）退到根目录 C: 输入composer
运行成功后到vsCode中打开终端输入composer，此时应该是没有反应，
关闭vsCode再重新打开，输入composer显示成功

输入composer require "twig/twig"   
出现composer.json和composer.lock文件

输入composer update
出现vendor文件夹


重建数据库
----------------------------------------
php artisan migrate / php artisan migrate:fres
php artisan tinker
\App\Models\Ville::factory()->times(15)->create()
\App\Models\Edutiant::factory()->times(100)->create()


运行文件
-------------------------------------------
composer update
php artisan serve


laravel上传至webdev
----------------------------------------
添加文件 .htaccess
更改文件 .env
下载newProject文件夹，不要更改原文件，只将所有需要的文件加入至newProject中


从GitHub上复制文件
---------------------------------------
git clone https://github.com/2296789/.....


已有GitHub，新建分支，将当前版本上传至其中
----------------------------------------
git init
git add .
git commit -m "备注"
git remote add origin https://github.com/2296789/.....
git chekout -b 分支名
git push origin 分支名
git push origin 分支名 -f (不提取此路径已经变化的文件而强行上传)


将当前分支版本合并到main
-----------------------------------------
git checkout main
git merge 分支名
git push origin main
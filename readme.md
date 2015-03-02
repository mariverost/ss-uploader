## Laravel 4.2 PHP Framework Proof of Concept (PoC)

Detailed layout of src files used:

* ss-uploader/app/database/migrations/
0. 2015_03_02_161412_CreateUsersTable.php 
   Defines 'ssup_users' table.
1. 2015_03_02_161504_CreateContactsAndPhonenumbersAndEmailsAndLogsTables.php
   Defines ssup_contacts, ssup_phone_numbers, ssup_emails and ssup_user_logs tables.
   
* ss-uploader/app/database/seeds/
0. SeedUsersTableTableSeeder.php
   Populates 'ssup_users' table with some users.

* ss-uploader/app/models/
0. Contact.php, Email.php, PhoneNumber.php, User.php, UserLog.php
   Eloquent ORM mappings for DB tables.
   
* ss-uploader/app/
0. routes.php
   Routes for the PoC: login, upload, profile, logout.

* ss-uploader/app/views/users/
0. login.blade.php
   Page for log users in.
1. create.blade.php
   Page for registering new users.
2. profile.blade.php
   Users update page (unfinished).

* ss-uploader/app/views/files/
0. upload.blade.php
   Page for uploading files (CSV format only).
1. log.blade.php
   Page showing statistics about last file upload.

* ss-uploader/app/controllers/
0. UsersController.php
   Handles User business entity related use cases (login, logout, registration, profile).
1. FilesController.php
   Handles Contact business entity related use cases (upload file, log report).

Detailed of libraries used:

* Laravel Excel v2.0.0
Create and import Excel and CSV files in Laravel.

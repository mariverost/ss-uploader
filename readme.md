## Laravel 4.2 PHP Framework Proof of Concept (PoC)

Detailed layout of src files used:

* ss-uploader/app/database/migrations/
2015_03_02_161412_CreateUsersTable.php:
Defines 'ssup_users' table.
2015_03_02_161504_CreateContactsAndPhonenumbersAndEmailsAndLogsTables.php:
Defines ssup_contacts, ssup_phone_numbers, ssup_emails and ssup_user_logs tables.
   
* ss-uploader/app/database/seeds/
SeedUsersTableTableSeeder.php:
Populates 'ssup_users' table with some users.

* ss-uploader/app/models/
Contact.php, Email.php, PhoneNumber.php, User.php, UserLog.php:
Eloquent ORM mappings for DB tables.
   
* ss-uploader/app/
routes.php:
Routes for the PoC: login, upload, profile, logout.

* ss-uploader/app/views/users/
login.blade.php:
Page for log users in.
create.blade.php:
Page for registering new users.
profile.blade.php:
Users update page (unfinished).
* ss-uploader/app/views/files/
upload.blade.php:
Page for uploading files (CSV format only).
log.blade.php:
Page showing statistics about last file upload.

* ss-uploader/app/controllers/
UsersController.php:
Handles User business entity related use cases (login, logout, registration, profile).
FilesController.php:
Handles Contact business entity related use cases (upload file, log report).

* ss-uploader/app/tests/
UsersControllerTest.php:
Test for user creation (Didn't find a workaround for Failed asserting that Illuminate\Http\Response Object (...) is an instance of class "Illuminate\Http\RedirectResponse" error).

Detailed of libraries used:

* Cartalyst Sentry 2.1:
Framework agnostic authorization and authentication package.

* Mockery 0.9.3:
A simple yet flexible PHP mock object framework for use in unit testing with PHPUnit, PHPSpec or any other testing framework.

* Laravel Excel v2.0.0
Create and import Excel and CSV files in Laravel.

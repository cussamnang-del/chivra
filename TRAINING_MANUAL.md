# មេរៀនប្រើប្រាស់ប្រព័ន្ធ — Chivra
# (Training Manual — Chivra Multi-Currency / Money-Transfer / Gold / Real-Estate ERP)

> **ជំពូកទី ១ — ទិដ្ឋភាពទូទៅ** *(Chapter 1 — Overview)*

---

## ១.១ អ្វីជា Project នេះ? *(What is this project?)*

**Chivra** គឺជា Web Application សម្រាប់អាជីវកម្មប្តូរប្រាក់ ទិញ-លក់មាស ផ្ទេរប្រាក់ឆ្លងប្រទេស (កម្ពុជា ↔ ថៃ ↔ វៀតណាម) ការបើកវេរក្នុងស្រុក និងការគ្រប់គ្រងលក់អចលនទ្រព្យ បង់រំលស់។ ប្រព័ន្ធនេះគាំទ្រពហុក្រុមហ៊ុន (multi-company), គ្រប់គ្រងតាមដៃគូរ (partner ledger), និងតាមដាន SMS ពីធនាគារថៃដោយស្វ័យប្រវត្តិ។

**Chivra** is an ERP web application for currency exchange, gold trading, cross-border money transfer (Cambodia ↔ Thailand ↔ Vietnam), local cash-draw, and real-estate amortization / commission tracking. It supports multi-company tenancy, partner-ledger accounting, and automatic ingestion of Thai bank SMS notifications.

## ១.២ បច្ចេកវិទ្យាដែលប្រើ *(Tech Stack)*

| ផ្នែក / Layer | បច្ចេកវិទ្យា / Technology |
|---|---|
| Backend Framework | **Laravel 13** (PHP **8.3+**) — ត្រូវបាន upgrade ពី Laravel 11 (PR #1) |
| Database | **MySQL 8 / MariaDB 10.6+** (ត្រូវការ schema dump បន្ថែម — សូមមើលជំពូក ៣) |
| Frontend View | **Blade** templates (300+ views), **jQuery**, Bootstrap 5 (admin theme) |
| Real-time | **Laravel Reverb** + **Pusher** + **Ably** (សម្រាប់ broadcast រូបិយប័ណ្ណ live) |
| Push Notification | **Firebase Cloud Messaging** (kreait/laravel-firebase 7.x) |
| SMS / Notifications | **Telegram Bot** (តាមផ្លូវ `App\Services\TelegramService`) |
| Image / Camera | **Intervention Image 3**, **face-api.js** (សម្រាប់ webcam capture) |
| Static Analysis | **Larastan v3** (PHPStan level 0) — ឥឡូវនេះ ០ errors |
| Build | **Vite** + **NPM** (Laravel UI Bootstrap scaffold) |

## ១.៣ រចនាសម្ព័ន្ធ Folder *(Folder Structure)*

```
chivra/
├── app/
│   ├── Http/Controllers/        # 29 main controllers (Currency, Exchange, Gold, MoneyTransfer, Thai, ...)
│   │   ├── Auth/                # default scaffold (មិនបានភ្ជាប់ route)
│   │   └── CustomAuth/          # LoginController ប្រើប្រាស់ជាក់ស្តែង
│   ├── Models/                  # newer-style models (BuySaleGold, SMS, Property, ...)
│   ├── Services/                # TelegramService
│   ├── Http/Middleware/         # Authenticate, TrackOnlineUsers
│   ├── User.php  Customer.php  Company.php  ...  # legacy-style models នៅក្នុង namespace App\
│   └── PartnerTransfer.php      # មាន static helper phpformatnumber() (សូមមើល § ៥.៣)
├── config/
│   ├── helper.php               # ⭐ កំណត់ feature flags (realestate, hasgoldapp, multi_bussiness, ...)
│   ├── services.php             # Telegram / Facebook config (បានកែប្រែក្នុង PR #2)
│   └── auth.php                 # guard ប្រើ \App\User
├── database/
│   └── migrations/              # ⚠️ មាន migrations តែ ៨ ប៉ុណ្ណោះ — schema ភាគច្រើនចេញពី SQL dump
├── resources/views/
│   ├── master.blade.php         # layout សម្រាប់ user ធម្មតា
│   ├── mainfunction.blade.php   # dashboard សម្រាប់ Admin
│   ├── login/                   # login screen (មាន company selector + user picker)
│   ├── includes/sidebar.blade.php # navigation menu (១០ groups)
│   ├── currencies/  exchanges/  exchangeapps/  # ប្តូរប្រាក់ + មាស
│   ├── moneytransfers/  banktransfers/         # វេរលុយ
│   ├── thaicashdraws/                           # វេរពីថៃ + Thai SMS
│   ├── realestates/  lands/                    # អចលនទ្រព្យ
│   ├── partnerlists/  closelists/              # បញ្ជីដៃគូ + បិទបញ្ជី
│   ├── usercapitals/  employees/  expanses/    # ដើមទុន + បុគ្គលិក + ចំណូលចំណាយ
│   ├── reports/                                 # របាយការណ៏
│   └── customers/  companies/                  # ចុះឈ្មោះ
├── routes/web.php               # 615 routes (ក្រោយ cleanup ក្នុង PR #4)
├── public/                      # storage symlinked logs, logos, uploaded images
├── composer.json                # Laravel 13 + Sanctum, Reverb, Firebase, Intervention, Browsershot
└── .env                         # ⭐ កំណត់ DB, Telegram, Firebase, Pusher
```

---

> **ជំពូកទី ២ — ការដំឡើង** *(Chapter 2 — Installation & Setup)*

---

## ២.១ តម្រូវការប្រព័ន្ធ *(System Requirements)*

- **PHP 8.3** ឬខ្ពស់ជាង (Laravel 13 តម្រូវ; PHP 8.2 មិនអាចដំណើរការទេ)
- **Composer** ជំនាន់ ២.x
- **Node.js 18+** និង **NPM** សម្រាប់ Vite build
- **MySQL 8.x** ឬ **MariaDB 10.6+**
- ប្រសិនបើប្រើ Thai SMS: Database មួយផ្សេងទៀតសម្រាប់ `mysql_thai` connection
- ប្រសិនបើដាក់ផ្ទុក image / camera capture: extension `gd` ឬ `imagick`

## ២.២ ជំហានដំឡើង *(Step-by-Step Installation)*

### ជំហាន ១ — Clone និង Install Dependencies

```bash
git clone https://github.com/cussamnang-del/chivra.git
cd chivra

# PHP packages
composer install

# JavaScript packages
npm install
```

### ជំហាន ២ — កំណត់ Environment

```bash
cp .env.example .env
php artisan key:generate
```

កែ `.env` ដូចខាងក្រោម (សំខាន់ៗ):

```env
APP_NAME=Chivra
APP_ENV=production            # or "local" សម្រាប់ dev
APP_DEBUG=false               # ⭐ បិទ debug នៅ production
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chivra
DB_USERNAME=chivra
DB_PASSWORD=********

# Thai SMS database (បើប្រើ module វេរពីថៃ)
DB_THAI_HOST=127.0.0.1
DB_THAI_DATABASE=chivra_thai
DB_THAI_USERNAME=chivra
DB_THAI_PASSWORD=********

# Telegram bot (សម្រាប់ផ្ញើ SMS / alert ទៅ channel)
TELEGRAM_BOT_TOKEN=1234567890:AAEhBOweik...
TELEGRAM_CHAT_ID=-100123456789

# Facebook webhook (បើភ្ជាប់ Messenger)
FACEBOOK_VERIFY_TOKEN=your-verify-token
FACEBOOK_PAGE_TOKEN=EAAxxx...

# Firebase (សម្រាប់ push notification)
FIREBASE_CREDENTIALS=/absolute/path/to/firebase-credentials.json

# Pusher / Reverb (សម្រាប់ broadcast រូបិយប័ណ្ណ)
PUSHER_APP_ID=...
PUSHER_APP_KEY=...
PUSHER_APP_SECRET=...
PUSHER_APP_CLUSTER=ap1
```

> **សំខាន់**: សម្រាប់ keys ដែលដាក់ក្នុង `config/services.php` (Telegram / Facebook) កុំហៅ `env()` ដោយផ្ទាល់ក្នុង runtime code — ត្រូវហៅតាម `config('services.telegram.bot_token')` ដើម្បីជៀសវាង `null` នៅពេល `php artisan config:cache` ត្រូវបានដាក់ដំណើរការ (បានកែជាមួយ PR #2)។

### ជំហាន ៣ — Database Schema *(សំខាន់ — សូមអាន!)*

> ⚠️ **ចំណាំ**: Project នេះមិនមាន migrations គ្រប់គ្រាន់សម្រាប់បង្កើត schema ពេញលេញនោះទេ។ មាន migrations តែ ៨ ប៉ុណ្ណោះ (សម្រាប់តារាងមួយចំនួនថ្មីៗ ដូចជា `buy_sale_gold`, `properties`, `customer_exchanges` ជាដើម)។ តារាងសំខាន់ៗភាគច្រើនដូចជា `companies`, `users`, `roles`, `permissions`, `customers`, `currencies`, `exchanges`, `partner_transfers`, `cashdraws`, ល.ល. ត្រូវបាននាំចូលដោយដៃពី SQL dump file ដាច់ដោយឡែក។

ជំហានគួរធ្វើ:

```bash
# 1. បង្កើត database ទទេ
mysql -u root -p -e "CREATE DATABASE chivra CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 2. នាំចូល SQL dump ដែលបានរក្សាទុក (សុំពីម្ចាស់ project)
mysql -u root -p chivra < chivra_production_dump.sql

# 3. Run migrations តែឯងដែលមាន (មិនប៉ះតារាងដែលនាំចូលរួចហើយ)
php artisan migrate
```

ប្រសិនបើគ្មាន dump file សូមទាក់ទងអ្នកគ្រប់គ្រងប្រព័ន្ធ។ មិនមានវិធីផ្សេងបង្កើត schema ពេញលេញពី migrations នៅពេលនេះទេ។

### ជំហាន ៤ — Compile Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### ជំហាន ៥ — Storage Link និង Cache

```bash
php artisan storage:link
php artisan config:cache
php artisan view:cache
php artisan route:cache
```

> **គន្លឹះ**: នៅពេលដាក់ production បាននឹងបានស្រួល បើ deploy ត្រូវ run ៣ commands ខាងលើនេះម្តងទៀតបន្ទាប់ពី pull code ថ្មី។ បើទាស់នឹង `env()` ឬ route ថ្មីបាត់ — សូមដោះ cache:
```bash
php artisan config:clear && php artisan view:clear && php artisan route:clear
```

### ជំហាន ៦ — ចាប់ផ្ដើម Server

```bash
# Dev server
php artisan serve

# Real-time broadcast (Laravel Reverb) — បើប្រើ live rate display
php artisan reverb:start
```

បើក browser ទៅ `http://localhost:8000` — ប្រព័ន្ធនឹង redirect ទៅ `/login`។

## ២.៣ ការ Login លើកដំបូង *(First Login)*

ផ្ទាំង login មាន:
- **Company picker** — ជ្រើសរើសក្រុមហ៊ុន (សាខា) ដែលអ្នកចង់ login ចូលទៅកាន់
- **User picker** — បន្ទាប់ពីជ្រើស company ប្រព័ន្ធនឹងបង្ហាញ user accounts ដែលជាប់នឹង company នោះ
- **Password**
- **Remote password** (ប្រសិនបើ login ពីខាងក្រៅ IP whitelist របស់ក្រុមហ៊ុន)

ប្រព័ន្ធគូសវាស IP address ចូលប្រើ:
- បើ IP ត្រូវនឹង `companies.public_ip` → ចូលដោយ password តែម្នាក់ឯងបាន
- បើ IP ផ្សេង → ត្រូវការ `remote_password` បន្ថែម (កំណត់ដោយ Admin ក្នុង user profile)

⚠️ **សារៈសំខាន់**: បន្ទាប់ពី login លំនាំដើមរបស់ user ដែលជាងគេទាំងអស់ ត្រូវផ្លាស់ប្តូរ password ភ្លាមៗ។

---

> **ជំពូកទី ៣ — រចនាសម្ព័ន្ធទិន្នន័យ** *(Chapter 3 — Database Architecture)*

---

## ៣.១ តារាងសំខាន់ៗ ត្រូវបានចែកជា ១២ ក្រុមតាមមុខងារ

| # | Group / ក្រុម | Tables (សំខាន់ៗ) | គោលបំណង |
|---|---|---|---|
| 0 | **Companies** | `companies` | ក្រុមហ៊ុន/សាខា — multi-tenant root (មាន logo, public_ip whitelist) |
| 1 | **Auth & RBAC** | `users`, `roles`, `permissions`, `permission_users`, `user_onlines`, `page_times` | គណនី សិទ្ធិ និងតាមដាន online |
| 2 | **Addresses** | `addresses` | ខេត្ត ស្រុក ឃុំ ភូមិ (តម្លៃតាមកូដ) |
| 3 | **Customers** | `customers`, `customer_childs`, `customer_lists`, `agent_types` | អតិថិជន + កូនអតិថិជន + ប្រភេទភ្នាក់ងារ |
| 4 | **Currency Catalog** | `currencies`, `currency_buttons`, `product_rates`, `exchange_rates` | រូបិយប័ណ្ណ + ប៊ូតុង + អត្រាប្តូរប្រាក់ |
| 5 | **Exchange (ប្តូរប្រាក់)** | `exchanges`, `exchange_multis`, `customer_exchanges`, `customer_exchange_captures` | ការប្តូរប្រាក់ + capture ពី webcam |
| 6 | **Gold (មាស)** | `buy_sale_gold` | ការទិញ-លក់មាស + PL calculation (តម្លៃ, water/purity, Li, ប្រាក់កក់ deposit, is_close) |
| 7 | **Money Transfer (វេរលុយ)** | `partner_transfers`, `partner_transfer_lists`, `partner_transfer_temps`, `money_transfer_updates`, `cashdraws`, `cashdraw_selects`, `bank_transactions`, `wing_transaction_names`, `wing_code_infos` | ការផ្ទេរប្រាក់តាមដៃគូ ធនាគារ Wing |
| 8 | **Thai SMS (វេរពីថៃ)** | `sms` (សារ raw — នៅលើ `mysql_thai` connection), `sms_processes`, `sms_refreshes`, `sms_names`, `thai_customers`, `thai_accounts`, `thai_rates`, `thai_rate_sets`, `thai_close_lists`, `cashdraw_images` | SMS ពីធនាគារថៃ + ការដាក់បញ្ជី + cashdraw |
| 9 | **Real Estate (អចលនទ្រព្យ)** | `properties`, `property_groups`, `contracts`, `sale_details`, `new_pay_romlos`, `pay_commissions`, `set_over_days` | លក់ ធ្វើកុងត្រា បង់រំលស់ កម្រៃជើងសារ |
| 10 | **Capital & Expenses** | `user_capitals`, `user_offers`, `user_reports`, `user_report_details`, `user_statement_reports`, `user_transaction_reports`, `expanses`, `expanse_types`, `pay_commissions` | ដើមទុនបុគ្គលិក ស្នើរប្រាក់ ចំណូលចំណាយ |
| 11 | **Ledger & Reports** | `close_lists`, `close_list_details`, `daily_close_lists`, `partner_close_lists`, `stocks`, `stock_reports`, `stock_prints`, `money_print_slips`, `invoices`, `invoice_details`, `invoice_payments`, `payments`, `payment_details` | សៀវភៅបញ្ជី បិទបញ្ជី ស្តុក វិក្កយបត្រ |

## ៣.២ Relationship Diagram (សង្ខេប)

```
Company (1)
├── Users (N) ──── Roles (N) ──── Permissions (N via permission_users)
│   └── UserCapitals / UserOffers / UserReports
├── Customers (N)
│   ├── AgentType (1)
│   ├── Address: province / district / commune / village (4)
│   └── CustomerChild (N)
├── Currencies (N)
│   ├── CurrencyButton (N)
│   ├── ProductRate (N)
│   └── ExchangeRate (N — history per day)
├── Exchanges (N) — ប្តូរប្រាក់
│   └── ExchangeMulti (N)
├── BuySaleGold (N) — ទិញ-លក់មាស, មាន PL recalculated
├── PartnerTransfers (N) — វេរលុយឆ្លងដៃគូ
│   ├── PartnerTransferList (N)
│   └── MoneyTransferUpdate (N — log សកម្មភាព)
├── Cashdraws / BankTransactions / WingCodeInfo
├── SMS (N — Thai bank notifications, on `mysql_thai`)
│   └── SmsProcess (N — group_id, opdate, optime)
├── Properties (N) ── PropertyGroup (1) ── Currency (1)
│   ├── Contracts (N)
│   ├── SaleDetails (N)
│   ├── NewPayRomlos (N — រំលស់)
│   └── PayCommissions (N — កម្រៃជើងសារ)
├── Expanses (N) ── ExpanseType (1)
└── CloseLists / DailyCloseLists / PartnerCloseLists
```

## ៣.៣ Connections សំខាន់ៗ *(Database Connections)*

| Connection | Tables | គោលបំណង |
|---|---|---|
| `mysql` (default) | តារាងភាគច្រើនទាំងអស់ | Database មេ |
| `mysql_thai` | `sms`, `sms_processes` | Database មួយផ្សេងសម្រាប់ SMS ពីធនាគារថៃ (កំណត់ក្នុង `config/database.php`) |

---

> **ជំពូកទី ៤ — ម៉ូឌុលនិងមុខងារទាំងអស់** *(Chapter 4 — Modules & Features)*

---

## ៤.១ Dashboard (ផ្ទាំងគ្រប់គ្រង)

**URL**: `/dashboard` (redirect ទៅ `/home` បន្ទាប់ login)

- **Admin** ឃើញ view `mainfunction.blade.php` ដែលមាន ៧ cards លំនាំ:
  ដើមទុនបុគ្គលិក · ប្តូរប្រាក់ · ផ្ទេរប្រាក់ · បញ្ជីដៃគូ · លុយថៃ · អចលនទ្រព្យ · ការចុះឈ្មោះ · របាយការណ៏
- **User ផ្សេង** ឃើញ view `master.blade.php` ដែលមាន sidebar ១០ groups (សូមមើល § ៤.២)

> **ចំណាំ**: Dashboard បង្ហាញតែទិន្នន័យក្រុមហ៊ុនដែលបានជ្រើសរើស (company-scoped via `Session('log_into_company_id')`)។

## ៤.២ Sidebar Navigation (ប្រអប់ menu)

មាន ១០ groups សំខាន់ៗ ដែលអាស្រ័យលើ permissions របស់ user (កូដ menu លាក់ឬបង្ហាញតាម `permission_users`):

| # | Group (ខ្មែរ) | Group (English) | សកម្មភាពចម្បង |
|---|---|---|---|
| 0 | ពេញនិយម | Popular shortcuts | ផ្លូវកាត់ ១៧ ផ្ទាំងដែលប្រើច្រើនបំផុត (Thai SMS, ផ្ទេរប្រាក់, ប្តូរប្រាក់, ...) |
| 1 | អចលនទ្រព្យ | Real Estate | ធ្វើកុងត្រា, លក់, តារាងលក់, បង់រំលស់, កម្រៃជើងសារ |
| 2 | ដើមទុន | Staff Capital | ដើមទុនបុគ្គលិក, បិទបញ្ជី, ប្រតិបត្តិការ, ស្នើរប្រាក់, ចំណូលចំណាយ |
| 3 | ប្តូរប្រាក់ | Currency Exchange | របាយការណ៏, កំណត់អត្រាថ្មី, ប្រាក់ចំណេញ, រូបិយប័ណ្ណ, ផ្ទាំងបង្ហោះ, ប៉ុស្តិ៍ |
| 4 | វេរលុយ | Money Transfer | ផ្ទេរប្រាក់, ឆ្លងធនាគារ, តាមភ្នាក់ងារ, ដាក់ដក, ដាក់ដករហ័ស, កំណត់អត្រា, របាយការណ៏ |
| 5 | វេរពីថៃ | Thai Cashdraw / SMS | សារថៃ, បើកលុយថៃ, ទំនាក់ទំនងអតិថិជន, ចុះលេខបញ្ជី, របាយការណ៏, ស្តុក |
| 6 | បើកវេរ | Open Withdrawal | បើកវេរក្នុងស្រុក, របាយការណ៏បើកវេរ, ស្តុក, បើកវេរថៃ |
| 7 | បញ្ជីដៃគូ | Partner Ledger | សៀវភៅបញ្ជីថ្មី/ចាស់, បញ្ជីដៃគូទាំងអស់, កាត់កង, របាយការណ៏ |
| 8 | របាយការណ៏ | Reports | បិទបញ្ជី, សង្ខេប, ប្រាក់ចំណេញ, ស្តុក, ទិញលក់, ចំណូលចំណាយ |
| 9 | ចុះឈ្មោះ | Registration | អតិថិជន, បុគ្គលិក, ក្រុមហ៊ុន, កូនសាខា, ខេត្តក្រុង |

---

## ៤.៣ Currency Exchange (ប្តូរប្រាក់)

**Controller**: `App\Http\Controllers\CurrencyController` + `ExchangeController` + `ExchangeGoldController`

**URLs សំខាន់ៗ**:
- `/currency` — បញ្ជីរូបិយប័ណ្ណ
- `/exchange` — ផ្ទាំងប្តូរប្រាក់ (ប្រតិបត្តិការប្តូរ)
- `/setrate` (POST) — កំណត់អត្រាប្តូរប្រាក់ថ្មីពហុរូបិយប័ណ្ណ
- `/allrate`, `/goldrate`, `/tv`, `/ratedisplayrightsidebar` — ផ្ទាំងបង្ហោះអត្រាប្តូរប្រាក់ (សម្រាប់ TV / website / sidebar — មិនត្រូវការ login)
- `/exchangereport` — របាយការណ៏ប្តូរប្រាក់

**ដំណើរការសំខាន់**:
1. Admin/User ដែលមានសិទ្ធិ បញ្ចូលអត្រាប្តូរ buy/sale/ratebuy/ratesale សម្រាប់រូបិយប័ណ្ណនីមួយៗ
2. ប្រព័ន្ធរក្សាទុកក្នុង `exchange_rates` (ប្រវត្តិ) + update `currencies` (current rate)
3. បើ `config('helper.hasgoldapp')==1` ហើយ `isgold[$key]==1` — ប្រព័ន្ធ auto-recalculate PL ក្នុង `buy_sale_gold` (តាមរយៈ `updateBuySaleGoldPL()` — ត្រូវបាន sanitize ប្រឆាំង SQL injection នៅ PR #4)
4. Broadcast event `RateUpdated` ទៅ Reverb/Pusher → live displays refresh ភ្លាមៗ

> **គន្លឹះ**: ផ្ទាំងបង្ហោះអត្រា (TV, sidebar) មិនត្រូវការ authentication ទេ — អាចបង្ហាញលើផ្ទាំងសាធារណៈ។

## ៤.៤ Gold Trading (ទិញ-លក់មាស)

**Controller**: `ExchangeGoldController`
**Table**: `buy_sale_gold`

**មុខងារសំខាន់**:
- កត់ត្រាការទិញមាស (qty > 0) ឬ លក់មាស (qty < 0)
- គណនា Fine Gold = `Product * Water / 100` (Water = ភាគរយភាពបរិសុទ្ធ)
- គណនា PL (Profit & Loss) ប្រចាំ position:
  ```
  PL = qty * (current_price - opening_price)
  ```
  ដែល current_price = `$sale` បើ qty>0 (មាសទិញហើយ valued at សាច់) ឬ `$buy` បើ qty<0
- ប្រព័ន្ធ auto-close position នៅពេល `PL + deposit <= 0` ឬ position ចាស់ជាង ១៥ ថ្ងៃ
- បើ feature `config('helper.hasgoldapp')` បិទ — module នេះមិនបង្ហាញ

> **ឯកតា**: Li (លី) ជាឯកតារាប់មាសក្នុង Cambodia (1 li ≈ ៣៧.៥ ក្រាម)។

## ៤.៥ Money Transfer (វេរលុយ)

**Controller**: `MoneyTransferController`

**Sub-modules**:

### ៤.៥.១ ផ្ទេរប្រាក់ដៃគូ (Partner Transfer)
- **URL**: `/moneytransfer/formtransfer`
- ផ្ទេរប្រាក់ឆ្លងរវាង partner accounts ដែលអ្នកបានចុះឈ្មោះក្នុង `customers`

### ៤.៥.២ ផ្ទេរតាមធនាគារ (Bank Transfer)
- **URL**: `/moneytransfer/banktransfer`
- Controller: `BankTransferController`
- Table: `bank_transactions`

### ៤.៥.៣ ផ្ទេរតាមវីង (Wing Transfer)
- **URL**: `/moneytransfer/wingtransfer`
- Tables: `wing_transaction_names`, `wing_code_infos`
- ប្រព័ន្ធរក្សាទុក Wing code per agent type

### ៤.៥.៤ ដាក់ដកអតិថិជន (Customer Deposit / Withdrawal)
- **URL**: `/moneytransfer/customertransfer`
- ដាក់ប្រាក់ ឬដកប្រាក់សម្រាប់អតិថិជន (mekun +1 / -1)

### ៤.៥.៥ ដាក់ដករហ័ស (Quick Deposit / Withdrawal)
- **URL**: `/moneytransfer/quicktransfer`
- មិនត្រូវចុះបញ្ជីមុន — បំពេញ form ហើយចុះបញ្ជី immediate

### ៤.៥.៦ បើកវេរក្នុងស្រុក (Local Cashdraw)
- **URL**: `/moneytransfer/cashdraw`
- Table: `cashdraws`, `cashdraw_selects`
- បើកវេរសម្រាប់អតិថិជនមកយកសាច់ប្រាក់

> **ការកែប្រែសំខាន់**: PR #2 បានកែ duplicate key bug ដែលតែង set `ref_number` ទៅ `NULL` ដោយចៃដន្យក្នុង `cashdraw` create operation។ PR #4 បានដក route ស្លាប់ `/moneytransfer/continuecashdraw` ដែលហៅ method មិនមាន។

## ៤.៦ Thai SMS & Cashdraw (វេរពីថៃ)

**Controller**: `ThaiController` + `SMSController`
**Connection**: `mysql_thai` (សម្រាប់តារាង `sms`)

**ដំណើរការ**:
1. ធនាគារថៃផ្ញើ SMS notification ទៅ phone number របស់ក្រុមហ៊ុន
2. App phone (Android) parse SMS ហើយ POST ទៅ `/send-sms` (ឥឡូវត្រូវការ authentication — សុវត្ថិភាពកែជាមួយ PR #4)
3. SMS ត្រូវ forward ទៅ Telegram channel (តាម `App\Services\TelegramService`)
4. ប្រព័ន្ធ store ក្នុង `sms` table → process → group_id assignment → cashdraw ready

**URLs សំខាន់ៗ**:
- `/thaicashdraw/thaisms` — បញ្ជី SMS ចូលថ្មីៗ
- `/thaicashdraw/cashdraw` — បើកលុយថៃ (3 steps)
- `/thaicashdraw/cashdraw1` — ទំនាក់ទំនងអតិថិជន
- `/thaicashdraw/showgroupid` — បង្ហាញ group ledger
- `/thaicashdraw/notyetcashdrawreport` — របាយការណ៏លេខបញ្ជីដែលមិនទាន់បើក

**Step 1/2/3 Workflow**:
- **Step 1 (cashdraw)**: receive SMS → assign group_id
- **Step 2 (cashdraw1)**: contact customer, verify
- **Step 3 (cashdraw2)**: បើកលុយ → close ledger

> Auto-save: បើ `config('helper.auto_save_sms_thai_when_transfer')==1`, SMS ត្រូវបាន link ទៅ partner_transfer ដោយស្វ័យប្រវត្តិ។

## ៤.៧ Real Estate (អចលនទ្រព្យ)

**Controller**: `RealEstateController` + `LandController`
**Feature flag**: `config('helper.realestate')==1` ដើម្បីបង្ហាញ menu

**Sub-modules**:
- **ធ្វើកុងត្រា (Contract)**: `/realestate/contract` — បង្កើតកុងត្រាលក់/ទិញ
- **លក់ (Sale)**: `/realestate/sale` — បញ្ចូលការលក់ + SaleDetail
- **តារាងលក់**: `/realestate/saletable`
- **បង់រំលស់ (Romlos)**: `/realestate/payromlos` — Table `new_pay_romlos` រក្សាការបង់រំលស់ប្រចាំខែ
- **ទូទាត់កម្រៃជើងសារ (Commission)**: `/realestate/paycommission` — Table `pay_commissions`
- **ចុះឈ្មោះអចលនទ្រព្យ**: `/property/register` — Table `properties` + `property_groups`

**Concepts**:
- **Romlos (រំលស់)**: amortization payment plan — ការបង់ជាដំណាក់កាល
- **Kat Kong (កាត់កង)**: offsetting mutual debts រវាងភាគី
- **Property Group**: ប្រភេទអចលន (ដី, ផ្ទះ, ដីលក់ខ្ទះ, ល.ល.)

## ៤.៨ Partner Ledger (បញ្ជីដៃគូ)

**Controller**: `PartnerListController`
**Tables**: `partner_lists`, `partner_total_lists`, `partner_close_lists`, `partner_account`

**មុខងារ**:
- **សៀវភៅបញ្ជីថ្មី**: ledger ប្រចាំថ្ងៃ
- **សៀវភៅបញ្ជីចាស់**: archive
- **បញ្ជីដៃគូទាំងអស់**: cross-partner summary
- **កាត់កងបញ្ជីដៃគូ (Kat Kong)**: settle mutual debts — `linkgroup_id` ភ្ជាប់ records ដែលត្រូវ cancel គ្នា
- **របាយការណ៏កាត់កង**: history នៃ kat kong operations

> **គន្លឹះ Mekun**: ប្រព័ន្ធប្រើ multiplier (+1/-1) ដែលហៅ `mekun` ដើម្បីបង្ហាញថា transaction នោះបន្ថែម (+) ឬដក (-) ប្រាក់ពី balance របស់ដៃគូ។

## ៤.៩ Capital & Expenses (ដើមទុន និងចំណូលចំណាយ)

**Controllers**: `UserCapitalController`, `EmployeeController`, `ExpanseController`, `InvoiceController`, `PaymentController`

**Sub-modules**:
- **ដើមទុនបុគ្គលិក**: `/usercapital/index` — capital per staff member
- **បិទបញ្ជីបុគ្គលិក**: `/usercapital/closelist`
- **ប្រតិបត្តិការណ៏បុគ្គលិក**: `/usercapital/transactions`
- **បុគ្គលិកស្នើរប្រាក់ (User Offer)**: staff request salary advance
- **ចំណូលចំណាយ (Income/Expense)**: `/expanse/index` — categorized by `expanse_types`

## ៤.១០ Reports (របាយការណ៏)

**Controller**: `ReportController` + various per-module controllers

**ប្រភេទរបាយការណ៏**:
- **បិទបញ្ជីប្រចាំថ្ងៃ**: `/dailycloselist` — daily ledger close
- **របាយការណ៏បិទបញ្ជី**: `/closelist/report` — historical closes
- **របកបិទបញ្ជីសង្ខេប**: summary close
- **ប្រាក់ចំណេញផ្ទេរប្រាក់**: PL on money transfers
- **របាយការណ៏ស្តុក**: stock report (currency on hand)
- **របាយការណ៏ទិញលក់**: buy/sale activity
- **ព៌តមានស្តុក**: stock detail by currency
- **ចំណូលចំណាយ**: income/expense ledger

> **Export**: ប្រព័ន្ធគាំទ្រ export PDF (តាមរយៈ `spatie/browsershot` + Chrome headless) និង Excel/CSV (សម្រាប់របាយការណ៏សំខាន់ៗ)។

## ៤.១១ Customer Registration (ការចុះឈ្មោះ)

**Controllers**: `CustomerController`, `CompanyController`, `EmployeeController`, `ChildController`

**Modules**:
- **ចុះឈ្មោះអតិថិជន (Customer)**: `/customer/index` — primary entity (មាន agent_type, address tree)
- **ចុះឈ្មោះកូនសាខា (Customer Child)**: `/child` — sub-account under a parent customer
- **ចុះឈ្មោះខេត្តក្រុង (Province / Address)**: `/address` — Cambodia geo tree
- **ចុះឈ្មោះអ្នកប្រើប្រាស់ (User)**: `/user/storeuser`
- **ចុះឈ្មោះក្រុមហ៊ុន (Company / Branch)**: `/company` — multi-tenant root

## ៤.១២ Face Recognition Capture (Optional)

**Controller**: `CaptureController`
**Feature flag**: `config('helper.exchange_auto_capture')==1`

នៅពេលដែល user បើកផ្ទាំងប្តូរប្រាក់ — popup webcam មួយផ្សេងបើក (`/facerecognit`) — capture រូបអតិថិជន → POST ទៅ `/capture` (ឥឡូវត្រូវការ authentication — PR #4)។ ប្រព័ន្ធរក្សាទុក base64 image + 128-dim face descriptor → ប្រៀបធៀបនឹង `customer_exchange_captures` ដើម្បីកំណត់ recognition (threshold 0.55)។

---

> **ជំពូកទី ៥ — Authentication & Roles** *(Chapter 5 — Auth, Roles, Permissions)*

---

## ៥.១ Roles (តួនាទី)

**Model**: `App\Role` — table `roles` (column: `name`)

**តួនាទីស្តង់ដារ**:
- **Admin** — សិទ្ធិពេញលេញ ឃើញ Admin dashboard (`mainfunction.blade.php`) (មាន bypass logic ខ្លះ)
- **User ផ្សេង** — សិទ្ធិកំណត់តាម `permission_users` (permission per user, គ្មាន role-permission table)

## ៥.២ Permissions (សិទ្ធិ)

**Model**: `App\Permission` — table `permissions` (column: `maincode`, `code`, `name`)
**Pivot**: `permission_users` — link user ↔ permission (មាន column `pcdt` សម្រាប់ create/edit/delete/print flags)

ការប្រើ:
- Permission ត្រូវបាន seed ដូចជា menu codes (`code0_1`, `code0_2`, `code1_1`, ...)
- Sidebar JavaScript លាក់/បង្ហាញ menu items តាមរយៈ `permission_users` (មើល `master.blade.php`)
- Server-side checks តិចតួចបំផុត — ការការពារសិទ្ធិពឹងផ្នែកលើ frontend ច្រើនជាង Backend (សូមមើល § ៦.៣ សុវត្ថិភាព)

## ៥.៣ Login Flow (ដំណើរការ login)

1. GET `/login` → company picker + user list scoped to that company
2. POST `/login` (`checklogin`) → validate `username` + `password` + `company_id`
3. ប្រព័ន្ធ check client IP:
   - បើ IP ⊂ `companies.public_ip` (delimited by `/`) → ✅ login ភ្លាមៗ
   - បើ IP ផ្សេង → ត្រូវការ `remote_password` បន្ថែម (Hash::check against user's `remote_password` column)
4. បង្កើត session, save `log_into_company_id` ក្នុង session
5. Set cookie `company_id_cookie` (365 days TTL)
6. Redirect → `/home` → `/dashboard`

**Password reset**: `/user/change-password` (logged-in users តែប៉ុណ្ណោះ)

**Attempt counter**: `users.attempt` increment រាល់ login fail; ≥ 5 fails → forced logout + login refused។

**Helper static method**:
```php
PartnerTransfer::phpformatnumber(1234.567);  // "1,234.567"
```
ត្រូវបានហៅពី `getRefDataByGroupId()`។ មុន PR #3 ត្រូវបាន declare global ដែលធ្វើឱ្យ Blade views (300+ inline definitions) crash ដោយ "Cannot redeclare phpformatnumber()" — បានដោះស្រាយដោយប្តូរទៅ static method។

---

> **ជំពូកទី ៦ — Configuration & Operations** *(Chapter 6 — Config & Ops)*

---

## ៦.១ Feature Flags (`config/helper.php`)

| Key | Default | មុខងារ |
|---|---|---|
| `system_title` | `'ឡៅ ពួយឃាង ០៥'` | ឈ្មោះប្រព័ន្ធបង្ហាញលើផ្ទាំង |
| `system_subtitle` | `'ប្តូរប្រាក់'` | sub-title |
| `realestate` | `1` | បើក/បិទ menu អចលនទ្រព្យ |
| `hasgoldapp` | `'1'` | បើក/បិទ Gold module + auto-PL update |
| `multi_bussiness` | `10` | ចំនួន company អតិបរមាដែលអាចបង្កើត |
| `exchange_auto_capture` | `1` | បើ ១ — popup webcam capture នៅពេលចូលផ្ទាំងប្តូរប្រាក់ |
| `set_rate_pandp_mode` | `'1'` | 0=default, 1=reverse — សម្រាប់ P&P (THB/VND) rate calculation |
| `auto_save_sms_thai_when_transfer` | `'1'` | link SMS ↔ partner transfer auto |
| `auto_closelist_rate` | `0` | auto-close ledger តាមអត្រា |
| `transfer_option` | `'chivra'` | brand identifier |
| `isphnompenhrate` | `'0'` | flag for Phnom Penh-specific rate logic |
| `col_vnd` | `0` | display VND column |
| `thai_bangkut_usd` | `1` | Thai-side USD conversion |
| `khmer_bangkut_usd` | `0` | Cambodia-side USD conversion |
| `asset_path` | `asset('/public')` | ផ្លូវ asset សម្រាប់ image / logo |
| `autocontinueusercash` | `1` | auto-continue user cash flow |

## ៦.២ Services Configuration (`config/services.php`)

```php
'telegram' => [
    'bot_token'      => env('TELEGRAM_BOT_TOKEN'),
    'chat_id'        => env('TELEGRAM_CHAT_ID'),
    'app_url'        => env('APP_URL'),
],
'facebook' => [
    'verify_token'   => env('FACEBOOK_VERIFY_TOKEN'),
    'page_token'     => env('FACEBOOK_PAGE_TOKEN'),
],
```

> **ហេតុអ្វី** Telegram/Facebook ត្រូវដាក់ក្នុង `config/services.php` ដូចនេះ? ដោយសារ PR #2 — `env()` calls ត្រូវប្រើតែក្នុង config files; បើហៅ `env('TELEGRAM_BOT_TOKEN')` ដោយផ្ទាល់ក្នុង runtime code (controller/service) វានឹង return `null` នៅពេល `php artisan config:cache` ត្រូវបាន run នៅ production។

## ៦.៣ សុវត្ថិភាព *(Security Hardening — Recent Changes)*

| PR | កំណែប្រែ | សារៈសំខាន់ |
|---|---|---|
| #1 | Laravel 11 → 13 (PHP 8.3+) | Framework upgrade |
| #2 | កែ 6 bugs: login route name, fatal helper, duplicate key, env-in-runtime, undefined vars, test DB | Critical: protected pages នឹង 500 មុនពេលនេះ |
| #3 | Hotfix: global helper conflict | Critical regression fix |
| #4 | **SQL injection sanitization** in `updateBuySaleGoldPL` (CurrencyController + ExchangeGoldController) | Critical |
| #4 | Auth middleware បន្ថែមលើ `/send-sms`, `/track-time`, `/user-offline`, `/capture` | High — `/send-sms` បានបើកសម្រាប់ public មុនពេលនេះ → អាច spam Telegram channel |
| #4 | លុប routes ស្លាប់ ៦ (handler មិនមាន: `/moneytransfer/continuecashdraw`, `/saveuser_right`, ល.) | Cleanup |
| #5 | Larastan relation hints (clear 14 false positives) + `RegisterController` → `App\User` | Code quality |

**ការការពារសេចក្តីសុវត្ថិភាពនៅសល់ដែលអ្នកគ្រប់គ្រងគួរពិចារណា**:
- Permission checks ភាគច្រើនត្រូវបាន enforce តែនៅ frontend (sidebar lock) — API endpoints មួយចំនួនមិន check permission ត្រឹមត្រូវ
- `App\User` និង `App\Models\User` ទាំងពីរមាននៅក្នុង codebase (legacy + L11+ scaffold) — `App\User` ជា active model (config/auth.php), `App\Models\User` មាន `$fillable` ខុសគ្នា (ងាយប្រាក់ស្រាប់)
- Schema dump-based migration: backup database ឱ្យបានទៀងទាត់ (មិនអាច rebuild ពី migrations ទេ)

## ៦.៤ Cache & Deployment

```bash
# Pull latest code
git pull origin main

# Update dependencies
composer install --no-dev --optimize-autoloader
npm install
npm run build

# Clear & rebuild caches
php artisan config:clear
php artisan view:clear
php artisan route:clear

php artisan config:cache
php artisan view:cache
php artisan route:cache

# Migrate (run only new migrations — won't touch existing tables)
php artisan migrate --force

# Restart queue / Reverb if running
php artisan queue:restart
# (Reverb runs as separate supervisord process)
```

## ៦.៥ Backup Strategy *(យុទ្ធសាស្ត្រ backup)*

**សំខាន់**: ដោយសារ schema ត្រូវបាន maintained ដោយ SQL dump (មិនមាន migrations ពេញលេញ) — backup database ឱ្យបានទៀងទាត់ជាការសំខាន់បំផុត។

```bash
# Daily backup (cron 02:00 AM)
mysqldump -u chivra -p chivra | gzip > /backups/chivra_$(date +\%Y\%m\%d).sql.gz

# Keep last 30 days
find /backups -name "chivra_*.sql.gz" -mtime +30 -delete
```

នឹង backup ផងដែរ:
- `storage/app/public/` — logos, captured images, uploaded receipts
- `.env` (encrypted) — keys សម្ងាត់

---

> **ជំពូកទី ៧ — Troubleshooting** *(Chapter 7 — Common Issues)*

---

## ៧.១ Error: "Route [login] not defined"

មុនពេល PR #2 — route name អនុវត្តន៍ត្រូវ `showlogin` មិនមែន `login` ទេ។ ប្រសិនបើឃើញ error នេះក្នុង log:
- Update `Authenticate.php` middleware → ហៅ `route('showlogin')`
- Update Blade views ដែលហៅ `route('login')` → `route('showlogin')`
- (បានដោះស្រាយរួចហើយក្នុង PR #2)

## ៧.២ Error: "Cannot redeclare phpformatnumber()"

មុនពេល PR #3 — មាន global helper function declare ដែលប៉ះទង្គិចជាមួយ inline declarations ក្នុង 313+ Blade views។
- ត្រូវប្រាកដថា `composer.json` autoload **មិនមាន** `"files": ["app/helpers.php"]`
- ហៅ `PartnerTransfer::phpformatnumber($x)` ជា static method ជំនួសអោយ global function

## ៧.៣ Error: "Table 'chivra.companies' doesn't exist"

មានន័យថា database មិនទាន់នាំចូល schema dump។ ត្រូវធ្វើតាមជំហាន ៣ ក្នុង § ២.២។

## ៧.៤ env() returns null after deployment

មុនពេល PR #2 — code ហៅ `env()` ដោយផ្ទាល់ក្នុង controllers ច្រើនកន្លែង។ ប្រសិនបើអ្នកដាក់ `php artisan config:cache` នៅ production, env() calls outside config files នឹងត្រឡប់ `null`។
- ដាក់ keys ទាំងអស់ក្នុង `config/*.php` ហើយហៅ `config('services.telegram.bot_token')` ជំនួសវិញ

## ៧.៥ Auth bypass for unauthenticated POST endpoints

មុនពេល PR #4 — endpoints ៤ដូចជា `/send-sms`, `/track-time`, `/user-offline`, `/capture` មិនមាន `auth` middleware។ ឥឡូវនេះត្រូវការ session login។
- បើ external integration មួយ (mobile app, webhook) ប្រើ `/send-sms` ដោយគ្មាន login — ត្រូវកំណត់ API token system បន្ថែម (មិនទាន់មាននៅពេលនេះ)

## ៧.៦ Reverb / Pusher not broadcasting rates

```bash
# Check Reverb is running
ps aux | grep reverb

# Restart
php artisan reverb:restart

# Verify ABLY/Pusher config
php artisan tinker
>>> config('broadcasting.default')
>>> broadcast(new \App\Events\RateUpdated('test'))
```

---

> **ជំពូកទី ៨ — Quick Reference** *(Chapter 8 — Quick Reference)*

---

## ៨.១ ផ្លូវ URL សំខាន់ៗ

| URL | មុខងារ | Auth |
|---|---|---|
| `/login` | ចូលប្រើ | ❌ |
| `/dashboard` ឬ `/home` | Dashboard | ✅ |
| `/allrate`, `/goldrate`, `/tv` | ផ្ទាំងបង្ហោះអត្រា (សាធារណៈ) | ❌ |
| `/currency`, `/exchange`, `/setrate` | រូបិយប័ណ្ណ + ប្តូរប្រាក់ | ✅ |
| `/moneytransfer/*` | វេរលុយ | ✅ |
| `/thaicashdraw/*` | វេរពីថៃ | ✅ |
| `/realestate/*`, `/property/*` | អចលនទ្រព្យ | ✅ |
| `/customer/*`, `/company/*` | ការចុះឈ្មោះ | ✅ |
| `/closelist/*` | បិទបញ្ជី | ✅ |
| `/usercapital/*` | ដើមទុនបុគ្គលិក | ✅ |
| `/expanse/*` | ចំណូលចំណាយ | ✅ |
| `/report/*` | របាយការណ៏ | ✅ |
| `/send-sms` | Telegram forward (Thai SMS) | ✅ (PR #4) |
| `/facebook/webhook` | Facebook Messenger integration | ❌ (token-verified) |
| `/storage-link` | បង្កើត symlink | ✅ |

## ៨.២ Artisan Commands ប្រើច្រើនបំផុត

```bash
php artisan serve              # dev server
php artisan reverb:start       # real-time broadcast
php artisan tinker             # REPL

# Cache management
php artisan config:cache       # cache config
php artisan route:cache        # cache routes
php artisan view:cache         # precompile blade

php artisan config:clear
php artisan route:clear
php artisan view:clear

# Migrations (មាន ៨ migrations តែប៉ុណ្ណោះ)
php artisan migrate
php artisan migrate:status

# Storage
php artisan storage:link

# Static analysis (Larastan)
./vendor/bin/phpstan analyse   # Expected: "No errors" since PR #5
```

## ៨.៣ Composer Packages សំខាន់ៗ

```json
{
  "laravel/framework":       "^13.0",    // Framework (PR #1)
  "laravel/sanctum":         "^4.x",     // API tokens (មិនទាន់ដាក់ដំណើរការច្រើនទេ)
  "laravel/reverb":          "^1.x",     // Real-time broadcast
  "laravel/tinker":          "^3.0",     // REPL
  "laravel/ui":              "^4.x",     // Bootstrap scaffold
  "kreait/laravel-firebase": "^7.x",     // Firebase push (PR #1)
  "spatie/browsershot":      "^4.x",     // PDF via Chrome
  "intervention/image":      "^3.x",     // Image manipulation
  "pusher/pusher-php-server":"^7.x",     // Pusher SDK
  "larastan/larastan":       "v3.9.6"    // Static analysis (dev)
}
```

## ៨.៤ ការទាក់ទងសម្រាប់ Support

- **Repository**: https://github.com/cussamnang-del/chivra
- **Issue tracker**: GitHub Issues
- **Recent PRs**: #1 (L11→L13), #2 (audit fixes), #3 (helper hotfix), #4 (SQL injection + auth + dead routes), #5 (Larastan cleanup)

---

> **ឧបសម្ព័ន្ធ A — Khmer/English Glossary**

---

| ខ្មែរ | English | មានន័យ |
|---|---|---|
| ប្តូរប្រាក់ | Exchange | ការប្តូររូបិយប័ណ្ណ |
| វេរលុយ | Money Transfer | ការផ្ទេរប្រាក់ឆ្លងគណនី |
| វេរពីថៃ | Thai Cashdraw | ការទទួលប្រាក់ផ្ទេរពីប្រទេសថៃ (តាម SMS) |
| បើកវេរ | Cashdraw / Withdrawal | ការបើកសាច់ប្រាក់ឱ្យអតិថិជន |
| បញ្ជីដៃគូ | Partner Ledger | សៀវភៅគណនីដៃគូ |
| កាត់កង | Kat Kong / Offsetting | ការបន្សាបបំណុលគ្នាទៅវិញទៅមក |
| រំលស់ | Romlos / Amortization | ការបង់ប្រាក់ជាដំណាក់កាល |
| កម្រៃជើងសារ | Commission | ការទូទាត់សម្រាប់អន្តរការី |
| ដៃគូ | Partner | គូជំនួញ ឬ counterparty |
| ដើមទុនបុគ្គលិក | Staff Capital | មូលនិធិដែលក្រុមហ៊ុនផ្តល់ឱ្យបុគ្គលិក |
| បិទបញ្ជី | Close List | បិទបញ្ជីប្រចាំថ្ងៃ/សប្តាហ៍ |
| ស្តុក | Stock | ប្រាក់សាច់ដែលមាន (per currency) |
| ភ្នាក់ងារ | Agent | មនុស្សដែលធ្វើទំនាក់ទំនងជំនួស |
| ទឹក (មាស) | Water (Gold) | ភាគរយភាពបរិសុទ្ធនៃមាស |
| លី | Li | ឯកតារាប់មាស (≈ 37.5g) |
| ស្នើរប្រាក់ | Salary advance request | សំណើរយកប្រាក់មុនថ្ងៃខែ |
| ប្រាក់ចំណេញ | Profit | ប្រាក់ចំណូលក្រោយដក cost |
| ច.ច.ច (ចំណូលចំណាយ) | Income/Expense | ការតាមដានចំណូលនិងចំណាយ |
| ឆ្លងធនាគារ | Cross-bank | ការផ្ទេររវាងធនាគារផ្សេងគ្នា |
| វីង (Wing) | Wing | សេវាផ្ទេរប្រាក់ Wing (Cambodia) |
| ដាក់ដក | Deposit / Withdrawal | ដាក់ប្រាក់ ឬ ដកប្រាក់ |

---

> **ឧបសម្ព័ន្ធ B — Database Connections Reference**

`config/database.php` setup:

```php
'mysql' => [
    'driver'   => 'mysql',
    'host'     => env('DB_HOST', '127.0.0.1'),
    'port'     => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    // ... (default Laravel options)
],

'mysql_thai' => [
    'driver'   => 'mysql',
    'host'     => env('DB_THAI_HOST', '127.0.0.1'),
    'port'     => env('DB_THAI_PORT', '3306'),
    'database' => env('DB_THAI_DATABASE'),
    'username' => env('DB_THAI_USERNAME'),
    'password' => env('DB_THAI_PASSWORD'),
],
```

Models that use the `mysql_thai` connection:
- `App\Models\SMS` (`protected $connection = "mysql_thai";`)

---

*ឯកសារនេះត្រូវបាន generate ដោយផ្អែកលើ codebase ស្ថានភាពបច្ចុប្បន្ន (post-PR #5)។ បើមានកំណែប្រែ ឬមុខងារថ្មី — សូមធ្វើបច្ចុប្បន្នភាពឯកសារនេះតាមការសមរម្យ។*

*Last updated: 2026-05-26 (after PR #5 merge)*

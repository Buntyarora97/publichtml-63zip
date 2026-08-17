# Ayodhya Ram Mandir - Complete Devotional Portal

**Domain:** ayodhyarammandir.in  
**Technology:** Core PHP + MySQL + phpMyAdmin  
**Hosting:** Hostinger Shared Hosting Ready  
**Languages:** Hindi + English  

---

## ADMIN PANEL ACCESS

| Detail | Value |
|--------|-------|
| Admin URL | `https://ayodhyarammandir.in/admin` |
| Username | `admin` |
| Password | `Admin@123` |
| **IMPORTANT** | Change password after first login! |

---

## FEATURES

### Frontend (45+ Pages)
- Home Page with 12 luxury sections
- About Us with 10 sections
- Ram Mandir History & Architecture
- Complete Ramayan (all 7 Kands)
- Shri Ram Janam Katha
- Hanuman Ji Special Section
- Mata Sita Stories
- Live Aarti & Bhajan Player
- Kundli, Kundli Milan, Rashifal & Panchang
- Daily Suvichar
- Instagram Reels Section
- Photo Gallery with User Upload
- Devotee Reviews System
- Ayodhya Travel Guide
- Places to Visit in Ayodhya
- Blog System
- Prasad & Donation System
- Contact Page with Google Map
- Privacy Policy, Terms, Disclaimer
- Chatbot (Ram Mandir Guide Bot)
- Floating WhatsApp Button
- Back to Top Button

### Design Features
- Premium luxury devotional design
- Golden diya particle animations
- Saffron flag wave animations
- Bow and arrow design elements
- Temple arch borders
- Smooth scroll reveal (AOS)
- Card hover effects
- Button shine animations
- Parallax backgrounds
- Animated Ramayan timeline
- Floating diya effects
- Golden light rays
- Reading progress bar
- Sticky header
- Mobile responsive mega menu
- Premium typography (Cinzel, Playfair Display)
- Custom color palette: #FFFEBC, #FFD3A5, #FFAA6E, #FF8237, #F55900

### SEO Features
- SEO-friendly URLs
- Dynamic meta titles & descriptions
- Open Graph tags
- Twitter Cards
- Breadcrumb schema
- Article schema
- FAQ schema
- Organization schema
- XML Sitemap
- HTML Sitemap
- robots.txt
- hreflang Hindi/English
- Internal linking
- Lazy loading images
- WebP optimized images
- Proper H1/H2/H3 structure

### AdSense Ready
- Original generated content & images
- All required policy pages
- Clean ad placement slots
- Header, sidebar, content, footer ad positions
- Admin-managed AdSense codes

### Security
- Password hashing (bcrypt)
- PDO prepared statements
- CSRF token protection
- XSS protection
- SQL injection protection
- File upload validation
- Session timeout (2 hours)
- Admin roles (super_admin, admin, editor)
- Login attempt limiting

---

## INSTALLATION INSTRUCTIONS

### Step 1: Upload Files
1. Extract the zip file on your computer
2. Upload all files to your Hostinger public_html folder using FTP/File Manager
3. Make sure the `.htaccess` file is uploaded (it may be hidden)

### Step 2: Create Database
1. Login to your Hostinger control panel
2. Go to Databases > phpMyAdmin
3. Create a new database named `ayodhyarammandir`
4. Create a database user and password
5. Note down: Database Name, Username, Password

### Step 3: Import SQL
1. Open phpMyAdmin
2. Select the `ayodhyarammandir` database
3. Click on "Import" tab
4. Choose the file `ayodhyarammandir.sql`
5. Click "Go" to import all tables

### Step 4: Update Database Config
1. Open file: `includes/config/database.php`
2. Update these lines with your Hostinger database credentials:
```php
define('DB_HOST', 'localhost');     // Usually localhost
define('DB_NAME', 'your_db_name');   // Your database name
define('DB_USER', 'your_db_user');   // Your database username
define('DB_PASS', 'your_db_pass');   // Your database password
```
3. Update the site URL:
```php
define('SITE_URL', 'https://ayodhyarammandir.in');
```

### Step 5: Set Permissions
Set folder permissions (755 for folders, 644 for files):
```
assets/uploads/          - 755 (writable)
assets/uploads/gallery/  - 755 (writable)
assets/uploads/blogs/    - 755 (writable)
assets/uploads/media/    - 755 (writable)
 config/database.php      - 644 (compatibility loader)
 includes/config/database.php - 644 (database settings)
```

### Step 6: Admin Login
1. Visit: `https://ayodhyarammandir.in/admin`
2. Login with: Username `admin`, Password `Admin@123`
3. **Immediately change your password!**
4. Go to Settings to configure your site

---

## ADMIN PANEL MODULES

| Module | Description |
|--------|-------------|
| Dashboard | Analytics, stats, quick actions |
| Logo & Media | Manage logo, favicon, footer logo |
| Menu Manager | Full mega menu management |
| Marquee | Top announcement bar |
| Hero Section | Hero banner with video/image |
| Home Sections | All 12 home sections |
| About Sections | All 10 about sections |
| Pages | Create/edit unlimited pages |
| Ramayan Chapters | Manage Ramayan chapters |
| Hanuman Chapters | Hanuman Ji stories |
| Mata Sita Chapters | Mata Sita stories |
| Travel Pages | Ayodhya travel guides |
| Places to Visit | Tourist places management |
| Blog | Full blog system with categories/tags |
| Aarti Links | Live aarti YouTube links |
| Bhajans | Bhajan audio/video management |
| Instagram Reels | Reels/Shorts management |
| Kundli & Milan | Kundli pages and requests |
| Rashifal | Daily/weekly/monthly horoscope |
| Panchang | Daily panchang updates |
| Daily Suvichar | Daily devotional quotes |
| Festival Calendar | Festival dates and info |
| Gallery | Photo gallery management |
| User Uploads | Approve/reject user photos |
| Reviews | Manage devotee reviews |
| Chatbot FAQs | Manage chatbot questions/answers |
| Donation/Prasad | Donation settings and requests |
| Contact Messages | View and reply to messages |
| Google Map | Embed map settings |
| SEO Meta | Manage SEO for all pages |
| AdSense | Ad code management |
| FAQ Manager | FAQ questions and answers |
| Footer Links | Footer link management |
| Subscribers | Newsletter subscribers |
| Analytics | Page views and search logs |
| Site Settings | All site configuration |
| Admins | Manage admin users |
| Backup | Database backup tool |

---

## FILE STRUCTURE

```
ayodhyarammandir/
 admin/                  # Admin Panel
  includes/             # Admin templates
  *.php                 # Admin pages
 api/                    # API endpoints
  chatbot.php           # Chatbot API
  subscribe.php         # Newsletter API
 assets/
  css/
   style.css            # Main stylesheet
  js/
   main.js              # Main JavaScript
  images/               # All images
  uploads/              # User uploads
   gallery/
   blogs/
   media/
  config/
   database.php          # Compatibility loader
 includes/
   config/database.php   # Database config
  header.php            # Frontend header
  footer.php            # Frontend footer
  functions.php         # Core functions
  auth.php              # Authentication
 pages/                  # Page content
 .htaccess              # URL rewriting
 robots.txt             # Search engine rules
 sitemap.xml            # XML sitemap
 favicon.ico
 index.php              # Home page
 page.php               # Dynamic page template
 contact.php            # Contact page
 donation.php           # Donation page
 gallery.php            # Gallery page
 ayodhyarammandir.sql   # Database file
 README.md              # This file
```

---

## IMPORTANT SECURITY NOTES

1. **Change the default admin password immediately after first login**
2. **Change SECRET_KEY and ENCRYPTION_KEY in config/database.php**
3. Keep your database credentials secure
4. Regularly backup your database
5. Keep the admin URL private
6. Update the site settings with your actual information

---

## CUSTOMIZATION

### Change Colors
Login to Admin > Site Settings > Theme Colors to change the color scheme.

### Add Content
Login to Admin > Pages to create new pages. All pages support Hindi + English content.

### Manage Menu
Login to Admin > Menu Manager to add/edit navigation items and dropdowns.

### Add Images
Login to Admin > Gallery or use the Media Library to upload images.

### SEO
Login to Admin > SEO Meta to set meta titles, descriptions, and schema for each page.

### AdSense
Login to Admin > AdSense to add your Google AdSense codes.

---

## SUPPORT

For any issues or questions:
- Email: info@ayodhyarammandir.in
- Phone: +91-7988145192
- WhatsApp: +91-7988145192

---

## SHARED HOSTING DATABASE FIX

The current source is configured for the live Hostinger-style MySQL database
shown in the uploaded phpMyAdmin screenshot:

- Database: `u518916069_rammandir`
- User: `u518916069_rammandir`
- Host: `127.0.0.1`

The uploaded SQL filename starts with `u872449974`, but that is not the live
database shown in phpMyAdmin. Do not use that prefix for the live connection.
If your Hostinger hPanel shows a different database name, user, or password,
update the matching `DB_*` values in `includes/config/database.php`. The
password is not included in the SQL backup.

After importing the database backup in phpMyAdmin, also import
`hosting-database-fix.sql`. It adds the `keyword_pages` table required by the
admin dashboard, keyword pages, and sitemap.

The `.htaccess` file no longer contains `php_value` directives because those
can cause HTTP 500 on Hostinger's LiteSpeed/PHP-FPM handler. The equivalent
settings are in `.user.ini`.

If the site still shows HTTP 500, open Hostinger hPanel → Websites → Manage →
Errors, and check the PHP error log. The most common remaining cause is an
incorrect MySQL password or a database user that has not been assigned to the
database with full privileges.

---

## JAI SHRI RAM!

This portal is created with devotion to help spread the divine knowledge of Shri Ram, Ramayan, and Ayodhya Dham to the world.

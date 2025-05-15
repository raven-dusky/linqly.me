# Linqly.me - Minimalist Linktree Alternative 🌟

Linqly.me is an open-source project inspired by Linktree, designed for those who want to share all their links in a simple, clean, and distraction-free way. The interface is essential: a single page with all your most important links, allowing you to group them into one personalized link.

---

## 🚀 Main Features

- **Secure registration** with mandatory email verification  
- **Password reset** functionality  
- **Customization**: add links to the most popular platforms (about 20, including social, streaming, payments, etc.) + 5 additional generic links  
- **Mobile-first design**, super minimal and intuitive  
- **Secure authentication** powered by Laravel Fortify  

---

## 🛠 Tech Stack

- PHP
- Laravel
- Eloquent
- Fortify
- Livewire
- MySQL
- Bootstrap

---

## ⚡ Installation & Local Setup

Follow these steps to clone and run the project locally:

# Clone the repository
git clone https://github.com/raven-dusky/linqly.me.git
cd linqly.me

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Copy the environment configuration file
cp .env.example .env

# Generate the application key
php artisan key:generate

# Configure the database in the .env file (DB_DATABASE, DB_USERNAME, DB_PASSWORD, MAIL..)

# Run migrations and seed the database
php artisan migrate --seed

# Start the Laravel development server
php artisan serve

# In a second terminal, start Vite for assets
npm run dev

# In un secondo terminale, avvia Vite per gli assets
npm run dev

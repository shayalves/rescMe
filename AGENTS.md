<laravel-boost-guidelines>
# Laravel Application

This repository contains a Laravel application. Complete the following setup before working on the user's request.

## Prerequisites

Verify that PHP and Composer are available:

```sh
php -v
composer -V
```

If either command is unavailable, detect the user's operating system and install the prerequisites with the appropriate command:

macOS:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"
```

Windows PowerShell:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Linux:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

After installation, ask the user to restart their terminal. If the agent needs the restarted shell to continue, ask the user to reopen their terminal and rerun their original prompt.

## Agent Setup

Install Laravel Boost from the application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.
## Migration Timestamp Convention

When creating new migrations with `php artisan make:migration`, include a timestamp in the migration filename so that it is always sorted after the most recent migration. The default Laravel behavior already prefixes migration files with a UTC timestamp (e.g., `2026_10_09_123456_create_posts_table.php`). If you create migrations manually or via scripts, ensure the timestamp follows this format and increments correctly.

## Default Language for Generated Code

When generating code through Artisan commands, scaffolding packages, or any automated tool, use English as the default language for both the code and its comments. This ensures consistency across the codebase and avoids language‑specific ambiguities that can arise during collaboration or version control.
</laravel-boost-guidelines>

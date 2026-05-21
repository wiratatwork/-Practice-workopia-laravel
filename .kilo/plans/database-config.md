# Plan: Database Configuration (SQLite to PostgreSQL)

## Goal
Transition the application's database connection from SQLite to PostgreSQL using environment variables.

## Steps

### 1. Update `.env` Configuration
- Modify the following keys in the `.env` file:
    - `DB_CONNECTION`: Change `sqlite` to `pgsql`.
    - `DB_HOST`: Set to `127.0.0.1`.
    - `DB_PORT`: Set to `5432`.
    - `DB_DATABASE`: Set to `workopia`.
    - `DB_USERNAME`: Set to `workopia`.
    - `DB_PASSWORD`: Set to the password provided by the user.

### 2. Verification
- **Browser Check**: Refresh the application page. Expecting a "relation 'sessions' does not exist" or "SQLSTATE[42P01]: Undefined table" error, which confirms successful connection to an empty PostgreSQL database.
- **Tinker Check**: 
    - Run `php artisan tinker`.
    - Execute `DB::select('select version()');`.
    - Verify that the output shows the PostgreSQL version.

## Verification
- Connection is verified when `DB::select('select version()')` returns the PostgreSQL version string.

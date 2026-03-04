# IT9 PHP CRUD Activity

### Database setup

1. Create database in MySQL

```js
CREATE DATABASE php_crud_activity;
```

2. Verify

```js
SHOW DATABASES;
```

You should see:

`php_crud_activity`

3. Use the database

```js
USE php_crud_activity;
```

4. Create `todos` table

```js
CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    is_completed BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);
```

Now, database is ready.

## foods

-   id
-   name
-   price
-   rating
-   description
-   created_at
-   updated_at

## customers

-   id
-   first_name
-   last_name
-   email
-   phone_number
-   password
-   created_at
-   updated_at

## restaurants

-   id
-   name
-   rating
-   description
-   created_at
-   updated_at

## orders

-   id
-   customer_id
-   amount
-   location
-   status

## food_orders

-   order_id
-   food_id

## roles (system_admin,restaurant_admin,customer)

-   using Spatie's laravel-permission package

## Misc notes

```sql
SELECT SUM(amount) FROM orders WHERE status = 'PAID';
SELECT AVG(amount) FROM orders WHERE status = 'PAID';
```

## Feature by role

-   Admin user => Add foods with restaurant
-   Restaurant User => join foods with order
-   Customers => Orders foods with by submitting order info

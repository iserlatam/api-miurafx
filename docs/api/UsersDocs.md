# API Documentation - miurafx.com

## General Description

This documentation covers the `GET` and `POST` routes of the API at `https://miurafx.com/server/api/`, as well as a public route for user registration. Each route specifies its HTTP method, required permissions (authentication and roles), as well as the required and optional parameters.

### Base URL

The base URL for all authenticated routes is:

```
https://miurafx.com/server/api/
```

For public routes, the base URL is:

```
https://miurafx.com/
```

---

## Authenticated Routes

### 1. `/users` - User Management

-   **Methods:** `GET`, `POST`
-   **Middleware:** `jwt (jsonwebtoken gained after logging up)`
-   **Roles:** `master`, `monitor`, 'accesor', 'cliente'

#### GET `/users`

-   **Description:** Retrieves a list of all users.
-   **Headers:**

    -   `Authorization: Bearer <token>`

-   **Sample Response:**

```json
{
    "usuarios": [
        {
            "id": 1,
            "email": "barnie@email.com",
            "nombre_completo": "Barnie the Dinosaur",
            "cell_phone": "1234567890",
            "birth_date": "1980-01-01",
            "city": "Colombia",
            "country": "Colombia"
        },
        ...
    ]
}
```

#### POST `/users`

-   **Description:** Creates a new user.
-   **Headers:**

    -   `Authorization: Bearer <token>`

-   **Body:**

```json
{
    "email": "",
    "password": "",
    "nombre_completo": "",
    "direccion": "",
    "celular": "",
    "fecha_nacimiento": "",
    "etiqueta": "",
    "ciudad": "",
    "campanna": "",
    "afiliador": "",
    "tipo_documento": "",
    "documento": "",
    "metodo_pago": "",
    "pais": ""
}
```

-   **Sample Response:**

```json
{
    "status": "success",
    "message": "User created successfully",
    "data": {
        "id": 8,
        "email": "sample@email.com",
        "role": ["cliente"],
        "nombre_completo": "juan1 mesa1",
        "dirección": "st. 25 Av 101",
        "celular": "30000001",
        "fecha_nacimiento": null,
        "etiqueta": null,
        "ciudad": null,
        "tipo_documento": null,
        "documento": null,
        "método_pago": null,
        "pais": " colombia",
        "cliente_id": 1,
        "saldo": 0,
        "campanna": null,
        "afiliador": null,
        "created_at": "2024-09-16T23:48:36.000000Z",
        "updated_at": "2024-09-16T23:48:36.000000Z"
    }
}
```

---

### 2. `/users/import` - User Import

-   **Methods:** `POST`
-   **Middleware:** `jwt (jsonwebtoken gained after logging up)`
-   **Roles:** `master`

#### POST `/users/import`

-   **Description:** Allows uploading a `.csv` or `.xlsx` file to import users in bulk.
-   **Headers:**

    -   `Authorization: Bearer <token>`
    -   `Content-Type: multipart/form-data`

-   **Parameters:**

    -   A `.csv` or `.xlsx` file.

-   **URL for import:**  
    `https://miurafx.com/panel-de-control/usuarios/import`

-   **Prerequisite:**  
    Log in first at `https://miurafx.com/iniciar-sesión` with a `master` role user.

-   **Sample Response:**

```json
{
    "status": "success",
    "message": "Users imported successfully"
}
```

---

## Public Routes

### 3. `/auth/register` - User Registration

-   **Method:** `POST`
-   **URL:** `https://miurafx.com/api/auth/register`
-   **Description:** Allows public registration of a new user, without authentication.

#### POST `/auth/register`

-   **Body:**

```json
{
    "email": "",
    "password": "",
    "nombre_completo": "",
    "direccion": "",
    "celular": "",
    "fecha_nacimiento": "",
    "etiqueta": null,
    "ciudad": "",
    "tipo_documento": "",
    "documento": "",
    "metodo_pago": "",
    "pais": ""
}
```

-   **Sample Response:**

```json
{
    "status": "success",
    "message": "User registered successfully",
    "data": {
        "id": 1,
        "email": "",
        "nombre_completo": "",
        "cell_phone": "",
        "birth_date": "",
        "city": "",
        "country": ""
    }
}
```

---

### Notes:

-   All fields in the `POST` request bodies must be filled appropriately according to the validation rules defined in the backend.
-   For authenticated routes, the token must be included in the headers as a `Bearer Token`.
-   Ensure proper error handling for validation and authentication in each route.

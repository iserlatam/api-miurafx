# Documentación de API - miurafx.com

## Descripción General
Esta documentación cubre las rutas `GET` y `POST` de la API en `https://miurafx.com/server/api/` y una ruta pública para el registro de usuarios. Cada ruta especifica su método HTTP, los permisos necesarios (autenticación y roles), así como los parámetros requeridos y opcionales.

### URL Base
La URL base para todas las rutas autenticadas es:

```
https://miurafx.com/server/api/
```

Para las rutas públicas, la URL base es:

```
https://miurafx.com/api/
```

---

## Rutas Autenticadas

### 1. `/users` - Gestión de Usuarios
- **Métodos:** `GET`, `POST`
- **Middleware:** `auth-token`
- **Roles:** `master`, `monitor`

#### GET `/users`
- **Descripción:** Obtiene una lista de todos los usuarios.
- **Headers:**
  - `Authorization: Bearer <token>`
  
- **Respuesta Ejemplo:**
```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "email": "barnie@email.com",
            "nombre_completo": "Barnie el Dinosaurio",
            "celular": "1234567890",
            "fecha_nacimiento": "1980-01-01",
            "ciudad": "Colombia",
            "pais": "Colombia"
        },
        ...
    ]
}
```

#### POST `/users`
- **Descripción:** Crea un nuevo usuario.
- **Headers:**
  - `Authorization: Bearer <token>`
  
- **Body:**
```json
{
    "email": "",
    "password": "",
    "nombre_completo": "",
    "dirección": "",
    "celular": "",
    "fecha_nacimiento": "",
    "etiqueta": null,
    "ciudad": "",
    "tipo_documento": "",
    "documento": "",
    "método_pago": "",
    "pais": ""
}
```

- **Respuesta Ejemplo:**
```json
{
    "status": "success",
    "message": "Usuario creado exitosamente",
    "data": {
        "id": 1,
        "email": "",
        "nombre_completo": "",
        "celular": "",
        "fecha_nacimiento": "",
        "ciudad": "",
        "pais": ""
    }
}
```

---

### 2. `/users/import` - Importación de Usuarios
- **Método:** `POST`
- **Middleware:** `auth-token`
- **Roles:** `master`
  
#### POST `/users/import`
- **Descripción:** Permite subir un archivo `.csv` o `.xlsx` para importar usuarios en masa.
- **Headers:**
  - `Authorization: Bearer <token>`
  - `Content-Type: multipart/form-data`

- **Parámetros:**
  - Archivo en formato `.csv` o `.xlsx`.

- **URL para la importación:**  
  `https://miurafx.com/panel-de-control/usuarios/import`
  
- **Requisito previo:**  
  Iniciar sesión en `https://miurafx.com/iniciar-sesión` con un usuario que tenga el rol `master`.

- **Respuesta Ejemplo:**
```json
{
    "status": "success",
    "message": "Usuarios importados exitosamente"
}
```

---

## Rutas Públicas

### 3. `/auth/register` - Registro de Usuarios
- **Método:** `POST`
- **URL:** `https://miurafx.com/api/auth/register`
- **Descripción:** Permite registrar un nuevo usuario de forma pública, sin autenticación.

#### POST `/auth/register`
- **Body:**
```json
{
    "email": "",
    "password": "",
    "nombre_completo": "",
    "dirección": "",
    "celular": "",
    "fecha_nacimiento": "",
    "etiqueta": null,
    "ciudad": "",
    "tipo_documento": "",
    "documento": "",
    "método_pago": "",
    "pais": ""
}
```

- **Respuesta Ejemplo:**
```json
{
    "status": "success",
    "message": "Usuario registrado exitosamente",
    "data": {
        "id": 1,
        "email": "",
        "nombre_completo": "",
        "celular": "",
        "fecha_nacimiento": "",
        "ciudad": "",
        "pais": ""
    }
}
```

---

### Notas:
- Todos los campos de los cuerpos de las solicitudes POST deben ser completados adecuadamente según las reglas de validación establecidas en el backend.
- En las rutas autenticadas, el token debe ser incluido en los headers como `Bearer Token`.
- Asegúrate de manejar correctamente los errores de validación y autenticación para cada ruta.

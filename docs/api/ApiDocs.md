### API Reference

#### Endpoint: `/api/users`
- **Authentication**: **Required**
  - Todas las rutas bajo `/api/users` deben estar autenticadas usando tokens de acceso generados después de iniciar sesión en el sistema. El token debe ser enviado en los encabezados de las solicitudes en la forma: `Authorization: Bearer {token}`.
  - Los usuarios deben tener uno de los siguientes roles para acceder: `master`, `monitor`, `accesor`.

#### Endpoint: `/api/users`
- **Method**: GET
- **Description**: Obtiene la lista de todos los usuarios registrados en el sistema. Solo accesible para usuarios autenticados con roles permitidos.

##### Request Headers
```http
Authorization: Bearer {token}
```

##### Response (JSON)
Si la solicitud es exitosa, se devolverá una lista de usuarios en formato JSON. Cada usuario incluirá la siguiente información:

```json
[
    {
        "id": "integer", // ID único del usuario.
        "name": "string", // Nombre de usuario.
        "email": "string", // Correo electrónico.
        "role": "string", // Rol asociado al usuario.
        "created_at": "datetime", // Fecha de creación del usuario.
        "updated_at": "datetime"  // Fecha de última actualización.
    },
    ...
]
```

##### Códigos de Respuesta
- **200 OK**: La solicitud ha sido exitosa y se devuelve la lista de usuarios.
- **401 Unauthorized**: El token de autenticación no es válido o no se ha proporcionado.
- **403 Forbidden**: El usuario no tiene los roles adecuados para acceder a esta ruta.

---

#### Endpoint: `/api/users/{id}`
- **Method**: GET
- **Description**: Obtiene los detalles de un usuario específico basado en su ID. Solo accesible para usuarios autenticados con roles permitidos.

##### Request Headers
```http
Authorization: Bearer {token}
```

##### URL Parameters
- **`id`**: El ID del usuario que se desea consultar. Debe ser un entero válido.

##### Response (JSON)
Si la solicitud es exitosa, se devolverán los detalles del usuario en formato JSON:

```json
{
    "id": "integer", // ID único del usuario.
    "name": "string", // Nombre de usuario.
    "email": "string", // Correo electrónico.
    "role": "string", // Rol asociado al usuario.
    "created_at": "datetime", // Fecha de creación del usuario.
    "updated_at": "datetime"  // Fecha de última actualización.
}
```

##### Códigos de Respuesta
- **200 OK**: La solicitud ha sido exitosa y se devuelve la información del usuario.
- **401 Unauthorized**: El token de autenticación no es válido o no se ha proporcionado.
- **403 Forbidden**: El usuario no tiene los roles adecuados para acceder a esta ruta.
- **404 Not Found**: No se encontró un usuario con el ID proporcionado.

---

### Notas Adicionales
- **Autenticación**: Todos los endpoints bajo `/api/users` requieren autenticación. Asegúrate de que el token de autenticación generado en el proceso de login esté incluido en cada solicitud.
- **Autorización**: El acceso a estos endpoints está limitado a los usuarios que tengan roles `master`, `monitor`, o `accesor`.

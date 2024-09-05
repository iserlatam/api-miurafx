### API Reference

#### Endpoint: `/auth/register`
- **Method**: POST
- **Description**: Registra un nuevo usuario en el sistema. Este endpoint crea un nuevo usuario en la base de datos y le asigna el rol de 'cliente'.

##### Request Body (JSON)
El cuerpo de la petición debe enviarse en formato JSON con los siguientes campos:

```json
{
    "name": "string", // Obligatorio. El nombre de usuario. Máximo 255 caracteres.
    "email": "string", // Obligatorio. Debe ser una dirección de correo válida y única.
    "password": "string", // Obligatorio. Debe tener al menos 8 caracteres.
    "nombre_completo": "string", // Obligatorio. Nombre completo del usuario.
    "dirección": "string", // Obligatorio. Dirección del usuario. Máximo 255 caracteres.
    "celular": "string", // Obligatorio. Número de celular. Máximo 15 caracteres.
    "fecha_nacimiento": "date", // Obligatorio. Fecha de nacimiento en formato AAAA-MM-DD.
    "estado": "integer", // Obligatorio. Estado del usuario, representado como un número entero.
    "etiqueta": "string|null", // Opcional. Etiqueta asociada al usuario. Máximo 50 caracteres.
    "ciudad": "string", // Obligatorio. Ciudad de residencia. Máximo 100 caracteres.
    "tipo_documento": "string", // Obligatorio. Tipo de documento (ej. CC, TI). Máximo 10 caracteres.
    "documento": "string", // Obligatorio. Documento de identidad único. Máximo 20 caracteres.
    "método_pago": "string|null", // Opcional. Método de pago preferido. Máximo 50 caracteres.
    "pais": "string" // Obligatorio. País de residencia. Máximo 100 caracteres.
}
```

##### Response (JSON)
Si el registro es exitoso, se devolverá la siguiente respuesta JSON:

```json
{
    "message": "Usuario creado exitosamente",
    "user": {
        "id": "integer", // ID único del usuario.
        "name": "string", // Nombre de usuario.
        "email": "string", // Correo electrónico.
        "nombre_completo": "string", // Nombre completo del usuario.
        "dirección": "string", // Dirección del usuario.
        "celular": "string", // Número de celular.
        "fecha_nacimiento": "date", // Fecha de nacimiento.
        "estado": "integer", // Estado del usuario.
        "etiqueta": "string|null", // Etiqueta del usuario.
        "ciudad": "string", // Ciudad de residencia.
        "tipo_documento": "string", // Tipo de documento.
        "documento": "string", // Documento de identidad.
        "método_pago": "string|null", // Método de pago preferido.
        "pais": "string", // País de residencia.
        "created_at": "datetime", // Fecha de creación del usuario.
        "updated_at": "datetime"  // Fecha de última actualización.
    }
}
```

##### Códigos de Respuesta
- **201 Created**: El usuario ha sido creado exitosamente.
- **422 Unprocessable Entity**: Errores de validación. El cuerpo de la respuesta contendrá los detalles de los errores.

---

#### Endpoint: `/auth/login`
- **Method**: POST
- **Description**: Autentica a un usuario y devuelve un token de acceso. Este endpoint verifica las credenciales del usuario y, si son correctas, genera un token de autenticación.

##### Request Body (JSON)
El cuerpo de la petición debe enviarse en formato JSON con los siguientes campos:

```json
{
    "name": "string", // Obligatorio. El nombre de usuario.
    "password": "string" // Obligatorio. La contraseña del usuario.
}
```

##### Response (JSON)
Si el inicio de sesión es exitoso, se devolverá la siguiente respuesta JSON:

```json
{
    "token": "string", // Token de autenticación generado.
    "Type": "Bearer", // Tipo de token (Bearer).
    "role": "string" // Rol del usuario autenticado (por ejemplo, 'cliente', 'admin').
}
```

##### Códigos de Respuesta
- **200 OK**: Inicio de sesión exitoso. Se devuelve un token de autenticación.
- **401 Unauthorized**: Las credenciales proporcionadas son incorrectas.

### Notas Adicionales
- **Autenticación**: El token devuelto por el endpoint `/auth/login` debe ser utilizado en los encabezados de las solicitudes a endpoints que requieran autenticación, en la forma: `Authorization: Bearer {token}`.
- **Validación de campos**: Todos los mensajes de error de validación están personalizados en español.

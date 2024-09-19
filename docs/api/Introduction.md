# Miurafx API Reference

## Introduction

### Base URL

`https://miurafx.com/server/api`
We provide you with the base URL where all requests should be made. All requests to this URL require the following header:
```json
{
    'Content-Type': 'application/json, charset=UTF-8',
    Authorization: `Bearer ${token}`,
}
```

### Where do I get the token?

To obtain the token, you need to log in through `https://miurafx.com/server/auth/login` with the following credentials (copy and paste the object below into the request body):

#### Endpoint: `/auth/login`
- **Method**: POST
- **Description**: Authenticates a user and returns an access token. This endpoint verifies the user’s credentials, and if they are correct, generates an authentication token.
- **Request Body**: 
```json
{
  "email": "master1@miurafx.com",
  "password": "password"
}
```

##### Response Structure (JSON)

```json
{
    "token": string,
    "Type": string,
    "role": [
      string
    ],
    "id": int,
    "email": string,
    "status": int
}
```

##### Response Codes
- **200 OK**: Successful login. An authentication token is returned.
- **401 Unauthorized**: The provided credentials are incorrect.

## Visit the Users API reference [here](/UsersDocs.md)

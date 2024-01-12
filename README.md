# Bimy Store - Game Top-Up API Documentation

## Overview

Welcome to the Bimy Store Game Top-Up API documentation! This repository provides information and resources for developers looking to integrate the Bimy Store API into their applications for game top-up functionality.

Bimy Store is a platform that facilitates the seamless integration of game top-up services, allowing users to conveniently purchase in-game currency, items, and other virtual goods. This documentation will guide you through the API endpoints, authentication process, and provide examples to help you get started with integrating Bimy Store into your project.

## Getting Started

To begin using the Bimy Store Game Top-Up API, follow these steps:

1. **Sign Up for Bimy Store Account**: Make sure you have a Bimy Store account. If not, you can sign up at [Bimy Store](https://bimy-store.com/).

2. **Get API Key**: After signing up, obtain your API key from the Bimy Store developer portal. The API key is required for authentication in API requests.

3. **Explore Documentation**: Review the API documentation to understand the available endpoints, request and response formats, and any additional requirements.

## Authentication

All requests to the Bimy Store Game Top-Up API must include an API key for authentication. Include the API key in the `Authorization` header of your HTTP requests using the `Bearer` token format.

```http
Authorization: Bearer YOUR_API_KEY
```

## API Endpoints

### 1. Top-Up Request

Endpoint: `POST /api/topup`

Use this endpoint to initiate a game top-up request. Provide the necessary parameters in the request body, including the game ID, user ID, and amount.

```json
{
  "game_id": "your_game_id",
  "user_id": "user_unique_id",
  "amount": 100
}
```

### 2. Check Top-Up Status

Endpoint: `GET /api/topup/status/{transaction_id}`

Check the status of a specific top-up transaction using its unique identifier.

### 3. Get Game List

Endpoint: `GET /api/games`

Retrieve the list of supported games along with their respective IDs.

## Examples

### cURL Example

```bash
curl -X POST -H "Authorization: Bearer YOUR_API_KEY" -H "Content-Type: application/json" -d '{"game_id": "your_game_id", "user_id": "user_unique_id", "amount": 100}' https://bimy-store.com/api/topup
```

### Python Example

```python
import requests

url = "https://bimy-store.com/api/topup"
headers = {
    "Authorization": "Bearer YOUR_API_KEY",
    "Content-Type": "application/json"
}
data = {
    "game_id": "your_game_id",
    "user_id": "user_unique_id",
    "amount": 100
}

response = requests.post(url, headers=headers, json=data)
print(response.json())
```

## Support

If you encounter any issues or have questions, please [contact Bimy Store support](https://bimy-store.com/contact-us).

Happy coding!

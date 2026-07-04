# Laravel SMS Gateway Melipayamak Driver

Melipayamak SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-melipayamak
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=melipayamak
SMS_GATEWAY_MELIPAYAMAK_USERNAME=your-username
SMS_GATEWAY_MELIPAYAMAK_PASSWORD=your-password
```

```php
// config/services.php
'melipayamak' => [
    'username' => env('SMS_GATEWAY_MELIPAYAMAK_USERNAME'),
    'password' => env('SMS_GATEWAY_MELIPAYAMAK_PASSWORD'),
    'base_url' => env('SMS_GATEWAY_MELIPAYAMAK_BASE_URL', 'https://rest.payamak-panel.com/api/'),
],
```

## Driver Behavior

| Option | Value |
| --- | --- |
| Driver name | `melipayamak` |
| Default base URL | `https://rest.payamak-panel.com/api/` |
| `send()` endpoint | `POST SendSMS/SendSMS` |
| Authentication | `username` and `password` query parameters from `services.melipayamak.username` and `services.melipayamak.password` |
| Payload | Form data sent directly to Melipayamak |

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('melipayamak')->send([
    'to'   => '09123456789',
    'from' => '50004000',
    'text' => 'Hello from Melipayamak',
]);
```

The payload is passed directly to Melipayamak, so use the fields expected by the Melipayamak API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('melipayamak')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT

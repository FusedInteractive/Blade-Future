# Blade @future

This is a simple Blade directive that adds an attribute to elements to highlight that they're for future functionality and hides them in production.

In your `local` and `development` environments (configurable), any elements wrapped in `@future` will have a `x-future` attribute applied to them. **A CSS rule is not included and it's up to you to add one (see below for example).**

## Limitations and Examples

There must be **only one root element** under `@future` (like a Livewire component):

```blade
{{-- 👍 Do this! --}}
@future
    <ul>
        <li>Awesome feature</li>
    </ul>
@endfuture

{{-- 👎 DON'T do this! --}}
@future
    <h2>Awesome Feature</h2>

    <div>Now available!</div>
@endfuture
```

Blade components work too, but must be a single root element:

```blade
@future
    <x-plan name="Super Premium" price="99" />
@endfuture

{{-- resources/views/components/x-plan.php --}}
@props(['name', 'price'])
<div>
    <h2>{{ $name }}</h2>
    <div>{{ $price }}</div>
</div>
```

If you encounter any issues, make sure to run `php artisan view:clear` to clear out your compiled view cache.

## Styling

A CSS rule for `x-future` is not included. You must define one yourself. Here's an example you can use:

![CSS Example](example.png)

```css
[x-future] {
    background-image: url("data:image/svg+xml,%3Csvg width='70' height='25' viewBox='0 0 70 25' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M53.0202 17V8.27273H58.6963V9.59801H54.6011V11.9673H58.4023V13.2926H54.6011V15.6747H58.7304V17H53.0202Z' fill='%2371717A' fill-opacity='0.5'/%3E%3Cpath d='M44.8555 17V8.27273H48.1282C48.7987 8.27273 49.3612 8.38921 49.8157 8.62216C50.2731 8.85511 50.6183 9.18182 50.8512 9.60227C51.087 10.0199 51.2049 10.5071 51.2049 11.0639C51.2049 11.6236 51.0856 12.1094 50.847 12.5213C50.6112 12.9304 50.2632 13.2472 49.8029 13.4716C49.3427 13.6932 48.7774 13.804 48.1069 13.804H45.7759V12.4915H47.8938C48.2859 12.4915 48.6069 12.4375 48.8569 12.3295C49.1069 12.2188 49.2916 12.0582 49.4109 11.848C49.533 11.6349 49.5941 11.3736 49.5941 11.0639C49.5941 10.7543 49.533 10.4901 49.4109 10.2713C49.2887 10.0497 49.1026 9.8821 48.8526 9.76847C48.6026 9.65199 48.2802 9.59375 47.8853 9.59375H46.4365V17H44.8555ZM49.364 13.0455L51.5245 17H49.7603L47.6382 13.0455H49.364Z' fill='%2371717A' fill-opacity='0.5'/%3E%3Cpath d='M41.1961 8.27273H42.7771V13.9744C42.7771 14.5994 42.6294 15.1491 42.3339 15.6236C42.0413 16.098 41.6294 16.4688 41.0981 16.7358C40.5669 17 39.9461 17.1321 39.2359 17.1321C38.5228 17.1321 37.9007 17 37.3694 16.7358C36.8382 16.4688 36.4262 16.098 36.1336 15.6236C35.841 15.1491 35.6947 14.5994 35.6947 13.9744V8.27273H37.2757V13.8423C37.2757 14.206 37.3552 14.5298 37.5143 14.8139C37.6762 15.098 37.9035 15.321 38.1961 15.483C38.4887 15.642 38.8353 15.7216 39.2359 15.7216C39.6365 15.7216 39.9831 15.642 40.2757 15.483C40.5711 15.321 40.7984 15.098 40.9575 14.8139C41.1166 14.5298 41.1961 14.206 41.1961 13.8423V8.27273Z' fill='%2371717A' fill-opacity='0.5'/%3E%3Cpath d='M27.0293 9.59801V8.27273H33.9924V9.59801H31.2949V17H29.7267V9.59801H27.0293Z' fill='%2371717A' fill-opacity='0.5'/%3E%3Cpath d='M23.7535 8.27273H25.3344V13.9744C25.3344 14.5994 25.1867 15.1491 24.8912 15.6236C24.5986 16.098 24.1867 16.4688 23.6555 16.7358C23.1242 17 22.5035 17.1321 21.7932 17.1321C21.0802 17.1321 20.458 17 19.9268 16.7358C19.3955 16.4688 18.9836 16.098 18.691 15.6236C18.3984 15.1491 18.252 14.5994 18.252 13.9744V8.27273H19.833V13.8423C19.833 14.206 19.9126 14.5298 20.0716 14.8139C20.2336 15.098 20.4609 15.321 20.7535 15.483C21.0461 15.642 21.3927 15.7216 21.7932 15.7216C22.1938 15.7216 22.5404 15.642 22.833 15.483C23.1285 15.321 23.3557 15.098 23.5148 14.8139C23.6739 14.5298 23.7535 14.206 23.7535 13.8423V8.27273Z' fill='%2371717A' fill-opacity='0.5'/%3E%3Cpath d='M10.8608 17V8.27273H16.4517V9.59801H12.4418V11.9673H16.0682V13.2926H12.4418V17H10.8608Z' fill='%2371717A' fill-opacity='0.5'/%3E%3C/svg%3E") !important;
    background-position: center !important;
    background-repeat: repeat !important;
    background-size: 70px 25px !important;
    opacity: 0.4 !important;
    pointer-events: none !important;
}
```

## Configuration

By default, @future tags are only rendered on `local` and `development` environments. You can customize this in your `.env`:

```
FUTURE_ENVS=local,development,staging
```

They are removed during tests by default, but you can change this by setting this in your `.env`:

```
FUTURE_IN_TEST=true
```

# Change Log

The change log describes what is "Added", "Removed", "Changed" or "Fixed" between each release.

## 1.19.0 - 2020-10-21

### Changed

- `ConfiguredClientsStrategy` no longer implements `EventSubscriberInterface`,
  this has been moved to `ConfiguredClientsStrategyListener` to avoid initializing
  the strategy on every request.

## 1.18.0 - 2020-03-30

### Added

- Support the symfony/http-client
- Register PSR-17 / PSR-18 classes as services
- Allow to configure cache listeners on the cache plugin

### Changed

- Tests are excluded from zip releases
- Define plugin service templates as abstract to avoid warnings from Symfony

## 1.17.0 - 2019-12-27

### Added

- Support Symfony 5 and Twig 3.
- Configured clients are now tagged with `'httplug.client'`
- Adds a link to profiler page when response is from a Symfony application with
  profiler enabled
- Adding `blacklisted_paths` option of `php-http/cache-plugin`

### Changed

- Fixed error handling. Now TypeErrors and other \Throwable are correctly handled by ProfileClient
- Use tabular design in profiler for HTTP request/response headers

### Deprecated

- `httplug.collector.twig.http_message` service
- `httplug_markup` Twig function

## 1.16.0 - 2019-06-05

### Changed

- Dropped support for PHP < 7.1
- Dropped support for Symfony versions that do not receive bugfixes

### Added

- Integration for VCR Plugin

### Fixed

- Fix compatibility with curl-client `2.*`. The `CurlFactory` now builds the
  client using PSR-17 factories. Marked a conflict for curl-client `1.*`.

## 1.15.2 - 2019-04-18

### Fixed

- Fix to pass only allowed options to the `ContentTypePlugin`.

## 1.15.1 - 2019-04-12

### Fixed

- Fix undefined `$serviceId` when a client is named "default".

## 1.15.0 - 2019-03-29

### Added

- Autowiring support for FlexibleClient, HttpMethodsClientInterface and
  BatchClientInterface if they are enabled on the default/first client.
  (Only available with Httplug 2)
- Configuration for the content_type plugin
- Support for namespaced Twig classes.
- Configuration option default_client_autowiring that you can set to false
  to prevent autowiring the HttpClient and HttpAsyncClient

### Changed

- Moved source code to `src/` and tests to `tests/`
- Removed `twig/twig` dependency
- Removed hard dependency on `php-http/cache-plugin`. If you want to use the
  cache plugin, you need to require it in your project.
- Allow to set `httpplug.profiling.captured_body_length` configuration to `null`
  to avoid body limitation size.

### Fixed

- MockFactory now accepts any client, e.g. a mock client decorated with the
  plugin client for the development panel, so that configuring a mock client
  actually works. The MockFactory is now `final`.
- Width of the HTTPlug icon in Profiler Toolbar.
- `RequestExceptionInterface` formatting (`getResponse()` is not called anymore).

## 1.14.0

### Added

- Support for any PSR-18 client.

### Changed

- Allow version 2 of `php-http/client-common`

### Fixed

- Fix deprecated notice when using symfony/config > 4.2
- Profiler does not display stack when client name contains dots

## 1.13.1 - 2018-11-28

### Fixed

- Fix wrong duration calculation for asynchronous calls

## 1.13.0 - 2018-11-13

### Added

- Allow to configure the `QueryDefaultsPlugin`

## 1.12.0 - 2018-10-25

### Added

- Add configuration option to allow making client services public if needed

## 1.11.0 - 2018-07-07

### Added

- Add support for QueryParam in the AuthenticationPlugin

### Fixed

- Deprecation warnings on Symfony 4.1

## 1.10.0 - 2018-03-27

### Added

- Allow to configure the `AddPathPlugin` per client, under the `add_path` configuration key.
- Allow to configure clients with a `service` instead of a factory.

## 1.9.0 - 2018-03-06

### Added

- Allow to configure the `BaseUriPlugin` per client, under the `base_uri` configuration key.

## 1.8.1 - 2017-12-06

### Fixed

- `PluginClientFactory` name conflict with PHP 5.x.

## 1.8.0 - 2017-11-30

### Added

- Symfony 4 support.
- Support autowiring of `Http\Client\Common\PluginClientFactory`.
- Any third party library using `Http\Client\Common\PluginClientFactory` to create `Http\Client\Common\PluginClient`
instances now gets zero config profiling.
- `Http\HttplugBundle\Collector\Collector::reset()`

### Changed

- `ProfilePlugin` and `StackPlugin` are no longer registered as (private) services decorators. Those decorators are now
created through the `Http\HttplugBundle\Collector\PluginClientFactory`.

### Deprecated

- The `Http\HttplugBundle\ClientFactory\PluginClientFactory` class.

### Fixed

- Removed wrapping auto discovered clients in a `PluginClient`, prevent double profiling.
- Added missing service reference for `CachePlugin`'s `cache_key_generator` configuration option so that the option now actually works.

## 1.7.1 - 2017-08-04

### Fixed

- Display of the profiler panel when used in a symfony/flex project.

## 1.7.0 - 2017-07-25

### Added

- Add `Http\Message\MessageFactory`, `Http\Message\StreamFactory`, `Http\Message\UriFactory` and `Http\Client\HttpAsyncClient`
services aliases for autowiring in Symfony 3.3.
- Redirect requests are now displayed as nested.

### Changed

- Plugins are now displayed with their FQCN instead of service id.

### Deprecated

- The `DummyClient` interface.

## 1.6.0 - 2017-05-22

### Added

- Made the "factory" configuration key optional.

### Changed

- We do collect profiler data after the request is processed by a plugin. With this change we
will for example see the changes of `HeaderAppendPlugin` at that plugin instead of the next one.

## 1.5.0 - 2017-05-05

### Added

- The real request method and target url are now displayed in the profiler.
- Support the cache plugin configuration for `respect_response_cache_directives`.
- Extended WebProfilerToolbar item to list request with details.
- You can now copy any request as cURL command in the profiler.
- Support for autowring in Symfony 3.3
- Improved configuration validation

### Changed

- The profiler design has been updated.
- Removed stopwatch-plugin in favor of `ProfileClient`.

### Deprecated

- The configuration option `cache.config.respect_cache_headers` should no longer be used. Use `cache.config.respect_response_cache_directives` instead.

## 1.4.1 - 2017-02-23

### Fixed

- Make sure we always have a stack

## 1.4.0 - 2017-02-21

### Changed

- The profiler collector has been rewritten to use objects instead of arrays.
- Bumped minimum Symfony version to 2.8.
- Updated profiler badges to match Symfony 2.8+ profiler design.

### Fixed

- WebProfiler is no longer broken when there was a redirect.
- Dummy client should provide methods of HttpClient and HttpAsyncClient

## 1.3.0 - 2016-08-16

### Added

- You can now also configure client specific plugins in the `plugins` option of a client.
- Some plugins that you previously had to define in your own services can now be configured on the client.
- Support for BatchClient
- The stopwatch plugin included by default when using profiling.

### Changed

- All clients are registered with the PluginClient (even in production)
- Improved debug tool registration

### Deprecated

- `auto` value in `toolbar.enabled` config
- `toolbar` config, use `profiling` instead

### Fixed

- Decoder, Redirect and Retry plugins can now be used and no longer trigger an error because of incorrect constructor arguments.


## 1.2.2 - 2016-07-19

### Fixed

- Do not register debug tools when debugging is disabled (eg. in prod mode)


## 1.2.1 - 2016-07-19

### Fixed

- Auto discovery by using the appropriate discovery class


## 1.2.0 - 2016-07-18

### Added

- Support for cRUL constant names in configuration
- Flexible and HTTP Methods client support
- Discovery strategy to discover configured clients and/or add profiling

### Changed

- Improved collector to include plugin stack in profile data


## 1.1.1 - 2016-06-30

### Changed

- Removed Puli logic and require `php-http/discovery:0.9` which makes Puli optional.


## 1.1.0 - 2016-05-19

### Added

- Client factories for Buzz.

### Changed

- Guzzle 6 client is now created according to the Httplug specifications with automated minimal behaviour.
  Make sure you configure the Httplug plugins as needed,
  for example if you want to get exceptions for failure HTTP status codes.
- **[BC] PluginClientFactory returns an instance of `Http\Client\Common\PluginClient`** (see [php-http/client-common#14](https://github.com/php-http/client-common/pull/14))
- Plugins are loaded from their new packages

### Fixed

- Puli autoload issue on >=PHP 5.6, see [puli/issues#190](https://github.com/puli/issues/issues/190)


## 1.0.0 - 2016-03-04

### Added

- New configuration for authentication plugin. You may now specify the authentication credentials directly in the bundle's configuration. This will break previous authentication configuration.
- Client factories for Curl, React and Socket.

### Fixed

- Bug with circular reference when a client was named 'default'

### Removed

- Dependency on `php-http/discovery`. You must now install `puli/symfony-bundle` to use auto discovery.


## 0.2.0 - 2016-02-23

## 0.1.0 - 2016-01-11

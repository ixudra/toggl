# Changelog

All Notable changes to `ixudra/toggl` will be documented in this file

## 2.1.2 - 2025-03-05
### Fixed
- Fixed incorrect URLs in `archiveClient()` and `restoreClient()` methods

## 2.1.1 - 2024-07-21
### Fixed
- Incorrect default offset for detailed reports

## 2.1.0 - 2024-07-21
### Added
- detailedBetween() method for detailed reports between two dates

### Updated
- v3 support for detailed reports
- Added offset parameter for detailed reports

## 2.0.0 - 2024-05-26
### Updated
- Updated package to support v9 of Toggle URL - v8 is no longer supported
- Updated README with new documentation
- `clients()` now collects all projects within a workspace, original implementation can be found in `userClients()`
- `projects()` now collects all projects within a workspace, original implementation can be found in `userProjects()`
- `tags()` now collects all projects within a workspace, original implementation can be found in `userTags()`
- `tasks()` now collects all projects within a workspace, original implementation can be found in `userTasks()`

## 1.2.0 - 2021-06-25
### Updated
- Added options to `workspaceProjects()` method

## 1.1.0 - 2021-04-21
### Updated
- Updated Toggl API URL for reports methods

## 1.1.0 - 2021-04-14
### Added
- Additional workspace methods

## 1.0.1 - 2021-04-07
### Updated
- Updated Toggl API URL

## 1.0.0 - 2021-03-16
### Updated
- Updated Toggl API URL

## 0.12.0 - 2020-10-11
### Added
- Laravel auto discover

## 0.11.0 - 2019-09-17
### Updated
- Updated composer to improve Laravel 6 compatibility
- Minor README fixes

## 0.10.0 - 2019-07-03
### Added
- detailedToday and detailedYesterday methods

## 0.9.0 - 2019-07-01
### Added
- detailedReports methods

## 0.8.0 - 2019-06-11
### Added
- summaryToday method
- summaryYesterday method
- projectTasks method

## 0.7.0 - 2019-06-11
### Added
- workspaces method

### Updated
- README

## 0.6.0 - 2019-05-28
### Added
- workspaceProjects method

## 0.3.0 - 2017-06-29
### Fixed
- Method name collision in traits

### Updated
- README



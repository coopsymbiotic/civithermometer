# civithermometer

![Screenshot](/images/screenshot.png)

This extension provides the ability to define and use a visual thermometer for contribution pages. When
enabled, people with CiviContribute access can easily choose to include a thermometer on their pages
and set goal and stretch goal targets for it.

For site administrators, the extension supports the definition of the desired HTML and CSS to render
the thermometer.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7+
* CiviCRM 5.19+

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl civithermometer@https://github.com/FIXME/civithermometer/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/FIXME/civithermometer.git
cv en civithermometer
```

## Usage

Once enabled, site administrators can define the HTML and CSS to render the thermometer under the path
`/civicrm/admin/thermometer`.

Users setting up contribution pages can navigate to a new 'Thermometer' tab and enable the thermometer there.
Once enabled, they can set goal and stretch goal targets, and tweak some of the language displayed in the
thermometer.

## Known Issues

The extension works by using JavaScript to get and calculate required values, then manipulate the DOM to
render and update the thermometer. At present the extension is expecting HTML elements that possess certain
class names. These will be documented in this file in due course.

The extension also currently only inserts the thermometer HTML at the end of the introductory text field.
There is no planned support for being able to choose which text field on the contribution page the
thermometer can be placed.

# civithermometer

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

More information about the required HTML and sample CSS & HTML exists in the `docs/` subdirectory. 

Users setting up contribution pages can navigate to a new 'Thermometer' tab and enable the thermometer there.
Once enabled, they can set goal and stretch goal targets, and tweak some additional settings for the
thermometer.

## Known Issues

The extension makes use of CiviCRM API v3 _and_ v4 calls. Sites running CiviCRM 5.19 or higher will have both
installed automatically. All v3 calls will eventually be rewritten as v4 calls.

The extension works by using JavaScript to get and calculate required values, then manipulate the DOM to
render and update the thermometer. At present the extension is expecting HTML elements that possess certain
class names. These will be documented in this file in due course.

The extension also currently only inserts the thermometer HTML at the end of the introductory text field.
There is no planned support for being able to choose which text field on the contribution page the
thermometer can be placed.

Finally, the placement of the Thermometer tab in the back office contribution page tabset is sub-optimal.
Most notably the "Save and Next" button behaviour is not what one would expect when in the Amount tab.

# Civithermometer HTML & CSS

The Civithermometer extension works by inserting HTML and CSS into a contribution page
then running a Javascript function to render the thermometer. The Javascript expects
certain HTML elements to exist, as defined by _id_.

This document documents the required HTML elements. This directory contains sample
CSS & HTML that you can use as a quickstart to get the thermometer up and running.

## Thermometer design

The thermometer should consist of a top level <div> with the id `civithermo_meter`.
All other thermometer elements exist within this <div>. The order of these elements
is up to your discretion.

The only particular dependencies is that the `civithermo_amount` element _must_
sit within the `civithermo_glass` element (see below).

The remaining thermometer elements are:

#### Target

Displays the goal amount of the contribution page. If a stretch amount is defined
and the amount raised surpasses the goal amount, the stretch amount is displayed.

**Identifier:** `civithermo_target`

**Example:** "TARGET ~~$5,000~~ $10,000"

#### Total

Displays the amount raised. If "double your donation" is enabled for the page
then the message is modifed accordingly.

**Identifier:** `civithermo_total`

**Example:** "$60 donated means $120 so far"

#### Glass

The visual thermometer "shell". This should be styled to draw a classic
thermometer shape. For example a vertical box with rounded ends.

**Identifier:** `civithermo_glass`

#### Amount

The filled percentage of the thermometer. It must sit within the glass element.
The Javascript modifies the height value of this element to fill the thermometer
glass to the appropriate height (ie. raised / goal as a percentage).

**Identifier:** `civithermo_amount

#### Donors

The number of people who have contributed so far.

**Identifier:** `civithermo_donors`

**Example:** "17 donors"

#### Raised

The amount raised expressed as a percentage of the goal (or stretch) amount.

**Identifier:** `civithermo_raised`

**Example:** "30% raised"

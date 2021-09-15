(function ($, ts) {

  $(function($) {

    // Load data from Civi data object
    const goal = parseInt(CRM.vars.civithermo.amountGoal);
    const stretch = parseInt(CRM.vars.civithermo.amountStretch);
    const raised = parseInt(CRM.vars.civithermo.amountRaised);
    const currency = CRM.vars.civithermo.currency;
    const donors = CRM.vars.civithermo.numberDonors;
    const isDouble = parseInt(CRM.vars.civithermo.isDouble);

    // Declare thermometer elements
    let thermo_target = document.getElementById('civithermo_target');
    let thermo_total = document.getElementById('civithermo_total');
    let thermo_amount = document.getElementById('civithermo_amount');
    let thermo_donors = document.getElementById('civithermo_donors');
    let thermo_raised = document.getElementById('civithermo_raised');

    let thermo_percent = Math.floor((raised / goal) * 100);

    // Get browser locale
    const locale = navigator.language;

    // If there's no goal amount then we exit early
    if ( isNaN(goal) ) { return };

    // Manipulate thermometer elements

    if (!isNaN(stretch) && raised >= goal) {
      thermo_target.innerHTML = ts('TARGET %1 %2', {
        1: '<span style="text-decoration: line-through">'
          + goal.toLocaleString(locale, {style: 'currency', currency: currency, minimumFractionDigits: 0}) + '</span> ', 
        2: stretch.toLocaleString(locale, {style: 'currency', currency: currency, minimumFractionDigits: 0})
      });
      thermo_percent = Math.floor((raised / stretch) * 100);
    } else {
      thermo_target.innerHTML = ts('TARGET %1', {
        1: goal.toLocaleString(locale, {style: 'currency', currency: currency, minimumFractionDigits: 0})
      });
    }

    if (isDouble) {
      thermo_total.innerHTML = ts('%1 DONATED MEANS<br />%2 SO FAR', {
          1: raised.toLocaleString(locale, {style: 'currency', currency: currency, minimumFractionDigits: 0}),
          2: (2 * raised).toLocaleString(locale, {style: 'currency', currency: currency, minimumFractionDigits: 0})
        });
    } else {
      thermo_total.innerHTML = ts('%1 SO FAR', {
        1: raised.toLocaleString(locale, {style: 'currency', currency: currency, minimumFractionDigits: 0})
      });
    }

    thermo_amount.style.height = thermo_percent + '%';
    thermo_donors.innerHTML = ts('%1 donors', {1: donors});
    thermo_raised.innerHTML = ts("%1% raised", {1: thermo_percent});

  });

}(CRM.$, CRM.ts('civithermometer')));


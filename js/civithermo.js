function civithermo_render() {
  // Load data from Civi data object
  const goal = parseInt(CRM.vars.civithermo.amountGoal);
  const stretch = parseInt(CRM.vars.civithermo.amountStretch);
  const raised = CRM.vars.civithermo.amountRaised;
  const currency = CRM.vars.civithermo.currency;
  const donors = CRM.vars.civithermo.numberDonors;

  // Declare thermometer elements
  let thermo_target = document.getElementById('civithermo_target');
  let thermo_total = document.getElementById('civithermo_total');
  let thermo_amount = document.getElementById('civithermo_amount');
  let thermo_donors = document.getElementById('civithermo_donors');
  let thermo_raised = document.getElementById('civithermo_raised');

  let thermo_percent = Math.floor((raised / goal) * 100);

  // Manipulate thermometer elements
  thermo_target.innerHTML = 'TARGET ' + goal.toLocaleString('en', {style: 'currency', currency: currency, minimumFractionDigits: 0});
  thermo_total.innerHTML = raised.toLocaleString('en', {style: 'currency', currency: currency, minimumFractionDigits: 0}) + ' SO FAR';
  thermo_amount.style.height = thermo_percent + '%';
  thermo_donors.innerHTML = donors + ' donors';
  thermo_raised.innerHTML = thermo_percent + '% raised';
}

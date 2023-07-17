const checkColumns = document.getElementById("check-columns");

// ['sku', 'name', 'quantity'].forEach(name => {
//   const elId = `check-${name}`;
//   const checkEl = checkColumns.querySelector(`#${elId}`);
//   checkEl.onchange = function () {
//     document.cookie = `${elId}=${this.checked}; path=/; samesite=lax;`;
//     location.reload(true);
//   };
// })

checkColumns.onchange = (e) => {
  document.cookie = `${e.target.id}=${e.target.checked}; path=/; samesite=lax;`;
  location.reload(true);
};

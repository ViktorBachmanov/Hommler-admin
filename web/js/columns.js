const checkColumns = document.getElementById("checkColumns");

// if (!checkColumns) {
//   return;
// }

const checkSku = checkColumns.querySelector("#checkSku");
checkSku.onchange = function () {
  document.cookie = `check-sku=${this.checked}; path=/; samesite=lax;`;
  location.reload(true);
};

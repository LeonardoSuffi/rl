<html lang="en">
    <script>
function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
  return results === null
    ? ""
    : decodeURIComponent(results[1].replace(/\+/g, " "));
}
let utm_source = getParameterByName("utm_source");
  let utm_medium = getParameterByName("utm_medium");
  let utm_campaign = getParameterByName("utm_campaign");
  let utm_term = getParameterByName("utm_term");
  let utm_content = getParameterByName("utm_content");
  let utm_position = getParameterByName("utm_position");
  let utm_device = getParameterByName("utm_device");
  let utm_match = getParameterByName("utm_match");
  let utm_creative = getParameterByName("utm_creative");
</script>
</html>
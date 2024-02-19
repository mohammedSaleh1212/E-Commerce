async function callAPI(url, data = {}) {
    var json = { result: 0, message: 'خطأ في الإتصال' }
    try {
      const response = await fetch(url, {
        method: "POST",
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ ...data, 'token': 'abc' }),
      });
      json = await response.json();
    } catch (error) {
      console.log('Error API ' + error)
    }
    return json;
  }
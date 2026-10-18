const BACKEND_ORIGIN = "https://manalo-reign-lavalust-1.onrender.com";
const HOP_BY_HOP_HEADERS = new Set([
  "connection",
  "content-encoding",
  "content-length",
  "host",
  "keep-alive",
  "transfer-encoding",
  "upgrade",
]);

module.exports = async function handler(req, res) {
  const requestUrl = new URL(req.url || "/", BACKEND_ORIGIN);

  if (!requestUrl.pathname.startsWith("/api/")) {
    return res.status(404).json({ success: false, error: "Not found." });
  }

  const method = req.method || "GET";
  const headers = new Headers();

  for (const [name, value] of Object.entries(req.headers)) {
    if (value === undefined || HOP_BY_HOP_HEADERS.has(name.toLowerCase())) {
      continue;
    }

    headers.set(name, Array.isArray(value) ? value.join(", ") : value);
  }

  let body;
  if (method !== "GET" && method !== "HEAD" && req.body !== undefined) {
    body =
      typeof req.body === "string" || Buffer.isBuffer(req.body)
        ? req.body
        : JSON.stringify(req.body);
  }

  try {
    const upstream = await fetch(requestUrl, { method, headers, body });
    const responseHeaders = {};

    for (const [name, value] of upstream.headers) {
      if (!HOP_BY_HOP_HEADERS.has(name.toLowerCase())) {
        responseHeaders[name] = value;
      }
    }

    const cookies = upstream.headers.getSetCookie();
    if (cookies.length > 0) {
      responseHeaders["set-cookie"] = cookies;
    }

    res.status(upstream.status).set(responseHeaders);
    return res.send(Buffer.from(await upstream.arrayBuffer()));
  } catch (error) {
    console.error("API proxy request failed:", error);
    return res.status(502).json({
      success: false,
      error: "The API service could not be reached.",
    });
  }
};

const fs = require("node:fs");
const path = require("node:path");

const sourceDirectory = path.join(__dirname, "public");
const outputDirectory = path.join(__dirname, "dist");

fs.mkdirSync(outputDirectory, { recursive: true });

for (const file of ["index.html", "app.js", "styles.css"]) {
  fs.copyFileSync(
    path.join(sourceDirectory, file),
    path.join(outputDirectory, file)
  );
}

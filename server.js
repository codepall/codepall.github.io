const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();
const folderPath = path.join(__dirname, 'ujian'); // Folder for files

// Middleware for serving static files from the 'public' folder
app.use(express.static(path.join(__dirname, 'public')));

// Endpoint to list files
app.get('/api/files', (req, res) => {
  fs.readdir(folderPath, (err, files) => {
    if (err) {
      return res.status(500).json({ error: 'Error reading files' });
    }
    res.json(files);
  });
});

// Endpoint to download files
app.get('/api/download/:filename', (req, res) => {
  const fileName = req.params.filename;
  const filePath = path.join(folderPath, fileName);

  if (!fs.existsSync(filePath)) {
    return res.status(404).json({ error: 'File not found' });
  }

  res.download(filePath);
});

// Start the server
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});

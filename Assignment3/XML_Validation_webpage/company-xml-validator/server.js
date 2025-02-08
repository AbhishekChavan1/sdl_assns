const express = require('express');
const multer = require('multer');
const libxmljs = require('libxmljs2');
const fs = require('fs');

const app = express();
const upload = multer({ storage: multer.memoryStorage() });

// Load XSD schema at startup
let xsdSchema;
try {
    const xsdContent = fs.readFileSync('./xmlValidation/companySchema.xsd', 'utf8');
    xsdSchema = libxmljs.parseXml(xsdContent);
} catch (err) {
    console.error('Failed to load XSD schema:', err);
    process.exit(1);
}

// Serve static files from the public folder
app.use(express.static('public'));

// Handle file upload and validation
app.post('/upload', upload.single('xmlFile'), (req, res) => {
    if (!req.file) {
        return res.status(400).json({ valid: false, errors: ['No file uploaded.'] });
    }

    try {
        // Parse the uploaded XML file using libxmljs2
        const xmlDoc = libxmljs.parseXml(req.file.buffer.toString());
        const valid = xmlDoc.validate(xsdSchema);

        if (valid) {
            res.json({ valid: true, errors: [] });
        } else {
            const errors = xmlDoc.validationErrors.map(err => err.message);
            res.json({ valid: false, errors });
        }
    } catch (err) {
        res.status(400).json({ valid: false, errors: ['Invalid XML: ' + err.message] });
    }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});

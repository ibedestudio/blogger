#!/bin/bash

echo "🚀 Starting Vercel build process..."

# Copy vendor directory if it exists in the repository
if [ -d "vendor" ]; then
    echo "📦 Using existing vendor directory..."
else
    echo "❌ Error: vendor directory not found!"
    exit 1
fi

# Create storage directory structure
echo "📁 Setting up storage directories..."
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs

# Set permissions
echo "🔒 Setting permissions..."
chmod -R 777 storage
chmod -R 777 bootstrap/cache

echo "✅ Build process completed!" 
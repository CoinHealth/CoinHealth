module.exports = {
    module: {
        loaders: [
            {
                test: /\.css$/,
                include: /node_modules/,
                loader:  'style!css'
            },
        ]
    }
};

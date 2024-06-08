const abbreviate_wallet = (wallet) => {
    if (wallet.endsWith(".sol")) {
        return wallet;
    } else {
        // first 4 letter ... last 4 letter
        return wallet.slice(0, 4) + "..." + wallet.slice(-4);
    }
};

export { abbreviate_wallet };

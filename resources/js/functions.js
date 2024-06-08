const abbreviate_wallet = (wallet) => {
    if (wallet.endsWith(".sol")) {
        return wallet;
    } else {
        // first 4 letter ... last 4 letter
        return wallet.slice(0, 4) + "..." + wallet.slice(-4);
    }
};

const is_embed = (file_hex) => {
    const embeds = ["SoundClound", "Vimeo", "YouTube"];
    if (embeds.includes(file_hex)) {
        return true;
    } else {
        return false;
    }
};

export { abbreviate_wallet, is_embed };

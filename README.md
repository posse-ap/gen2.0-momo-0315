# laravel インストール方法

1. `cd docker`
2. `docker compose build --no-cache` (ビルドする)
3. `docker compose up -d` (コンテナをたてる)
4. `docker compose exec app bash` (app コンテナに入る)
5. `composer create-project --prefer-dist laravel/laravel . "6.*"` (src 配下に laraavel6 をインストール)
6. ブラウザで`http://localhost`にアクセスし、「laravel」が表示されることを確認。

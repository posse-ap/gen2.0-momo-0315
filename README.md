# laravel インストール方法

`cd posse-3rd-webapp_env`

1. `docker compose build --no-cache` (ビルドする)

2. `docker compose up -d` (コンテナをたてる)

3. `docker compose exec app bash` (app コンテナに入る)

4. `composer create-project --prefer-dist laravel/laravel . "6.*"` (src 配下に laraavel6 をインストール)

5. ブラウザでhttp://localhostにアクセスし、「laravel」が表示されることを確認。

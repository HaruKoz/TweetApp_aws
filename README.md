# TweetApp
フレームワークを使用せず、プレーンなPHPで作成したTwitter風Webアプリケーションです。
<img src="https://user-images.githubusercontent.com/115539141/215316232-4a1417bf-d888-47eb-94ea-c7d920dbda81.png" alt="home">

# URL
- 応募書類をご参照ください。

# 使用技術
PHP/7.2.34

HTML

CSS

Apache/2.4.54

MariaDB/10.2.38

JavaScript(jQuery)

AWS(IAM, VPC, EC2, Route53, Certificate Manager)

CircleCI

# 機能一覧
- サインアップ（新規登録）
<img src="https://user-images.githubusercontent.com/115539141/215316215-e6bcec2b-985f-46ba-9f5f-68101d6411ec.png" width="600px" alt="signup">

- ログイン、ログアウト
<img src="https://user-images.githubusercontent.com/115539141/215316228-40c84067-d809-481c-8d13-23e3df64efaf.png" width="600px" alt="login">

- ツイート（投稿、削除）
<img src="https://user-images.githubusercontent.com/115539141/215320412-855dd23f-5794-4030-815d-d84f56d53ebc.gif" width="600px" alt="tweet-post">
<img src="https://user-images.githubusercontent.com/115539141/215320415-a12e71f4-726d-47cf-aa0f-35e21e94981f.gif" width="600px" alt="tweet-delete">

- いいね
<img src="https://user-images.githubusercontent.com/115539141/215320177-0fda3b64-0cf5-45ed-93be-73b3d20a37d3.gif" width="600px" alt="like">

- 各ユーザーの投稿、いいねしたツイートの一覧
<img src="https://user-images.githubusercontent.com/115539141/215319909-ba44d2dd-943a-4fbe-93db-d49753aea650.gif" width="600px" alt="">

- おすすめユーザー表示
- アカウント設定編集


# 工夫した点
- VSCodeでLintツール（PHP Intelephense、CSS Formatter）を用い、コードを綺麗に保つよう心掛けた。
- GitHubとCircleCIを連携させ、開発環境からgit pushしテスト成功後自動的にEC2へデプロイされるようにした。
- JavaScript(jQuery)による演出効果
    - いいねボタン押下時のハートの色、いいね数の変化
    - ツイート削除時のモーダルウィンドウのアニメーション
    - ユーザ毎のツイート一覧←→いいね一覧の切り替え時の見出し文字のボーダー移動のアニメーション
- 各種入力項目のバリデーションチェック
    - 必須入力チェック、文字列長チェック、半角英数字チェック、画像ファイルの拡張子チェック
    - Validationクラスに上記チェックの関数をまとめ、各種入力項目のクラスに継承させることでコードの保守性に配慮

# インフラ構成
<img src="https://tweetapp.harukoz.com/assets/infrastructure.png" width="600px" alt="infrastructure">

# 開発環境
Mac mini(M1, 2020)

macOS Monterey(12.6) 

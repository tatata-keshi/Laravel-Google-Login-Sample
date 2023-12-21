# このアプリについて
Googleログインのサンプルコードです
# 環境について

## 使い方

#### M1 Macの人
M1系列のCPU(M1, M2, M2 Proなど)を搭載しているMacを使用している方は、`docker-compose.yml`ファイルを開いて以下の行のコメントアウトを外す
```yml
platform: linux/amd64
```

#### Windowsの人
Windowsの人は[こちらのサイト](https://bluebirdofoz.hatenablog.com/entry/2019/10/24/221517)を見てGNUをインストールする

※Windowsの人は原因不明だけどpowershellだとうまくいかなかったのでcmdで実行

### 初回起動時
```bash(Winはcmd)
make init
```
全てのコンテナが立ち上がって、開発用のデータベースのcreate、migrate、seedまで完了する。

### 作業終了時
```bash
make down
```

### 作業再開時
```bash
make up
```

import subprocess
import os
from datetime import datetime

def backup_mysql_database(user, password, database, backup_dir):
    # 确保备份目录存在
    os.makedirs(backup_dir, exist_ok=True)

    # 设置备份文件名
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    backup_file = os.path.join(backup_dir, f"{database}_backup_{timestamp}.sql")

    # 构建本地 mysqldump 命令
    command = [
        "mysqldump",
        "-u", user,
        f"--password={password}",
        database
    ]

    # 将输出保存到本地文件
    with open(backup_file, "w") as f:
        subprocess.run(command, stdout=f, stderr=subprocess.PIPE)

    print(f"备份完成，文件保存在：{backup_file}")

# 示例用法
if __name__ == "__main__":
    backup_mysql_database(
        user="root",  # 数据库用户名
        password="123456",  # 数据库密码
        database="daily_app",  # 要备份的数据库名
        backup_dir="sql",  # 备份目录
    )

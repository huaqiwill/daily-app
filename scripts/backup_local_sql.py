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
        result = subprocess.run(command, stdout=f, stderr=subprocess.PIPE)

    # 检查备份是否成功
    if result.returncode != 0:
        print(f"备份失败：{result.stderr.decode()}")
        # 删除空文件
        if os.path.exists(backup_file) and os.path.getsize(backup_file) == 0:
            os.remove(backup_file)
            print(f"已删除空文件：{backup_file}")
    else:
        print(f"备份完成，文件保存在：{backup_file}")

# 示例用法
if __name__ == "__main__":
    backup_mysql_database(
        user="root",  # 数据库用户名
        password="123456",  # 数据库密码
        database="daily_app",  # 要备份的数据库名
        backup_dir="sql",  # 备份目录
    )

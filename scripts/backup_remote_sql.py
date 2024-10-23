import subprocess
import os
from datetime import datetime

def backup_mysql_database(host, user, password, database, backup_dir):
    # 确保备份目录存在
    os.makedirs(backup_dir, exist_ok=True)

    # 设置备份文件名
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    backup_file = os.path.join(backup_dir, f"{database}_backup_{timestamp}.sql")

    # 构建远程 mysqldump 命令
    command = (
        f"docker exec -i mysql mysqldump -h localhost -u {user} --password={password} {database}"
    )

    # 使用 ssh 执行远程命令并将输出保存到本地文件
    ssh_command = ["ssh", f"{user}@{host}", command]

    with open(backup_file, "w") as f:
        subprocess.run(ssh_command, stdout=f, stderr=subprocess.PIPE)

    print(f"备份完成，文件保存在：{backup_file}")

# 示例用法
if __name__ == "__main__":
    backup_mysql_database(
        host="150.158.199.226",  # 数据库主机
        user="root",  # 数据库用户名
        password="123456",  # 数据库密码
        database="daily_app",  # 要备份的数据库名
        backup_dir="sql",  # 备份目录
    )

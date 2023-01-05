FROM gitpod/workspace-full:2022-08-17-18-37-55

RUN sudo update-alternatives --set php $(which php8.1)
